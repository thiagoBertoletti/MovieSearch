<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\User;
use App\Http\Requests\EventRequest;


class EventController extends Controller
{
    public function index(Request $request) {

      // $search = request('search');

      if($request -> search) {

        $events = Event::where([
          ['title', 'like', '%'.$request -> search.'%']
        ])->get();

      } else {
        $events = Event::all();
      }

      return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(EventRequest $request) {
      
      $event = new Event;

      $event->title = $request->title;
      $event->date = $request->date;
      $event->city = $request->city;
      $event->private = $request->private;
      $event->description = $request->description;

      // img upload
      if($request->hasFile('image') && $request->file('image')->isValid()) {

       $requestImage = $request->image;

       $extension = $requestImage->extension();

       $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

       $requestImage->move(public_path('img/events'), $imageName);

       $event->image = $imageName;
      }

      $user = auth()->user();
      $event->user_id = $user->id;
      
      $event->save();

      return redirect('/')->with('msg', 'Filme adicionado com sucesso!');

    }

    public function show($id) {

      $event = Event::findOrFail($id);

      $eventOwner = User::where('id', $event->user_id)->first()->toArray();

      return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);

    }

    public function dashboard() {

      $user = auth()->user();

      $events = $user->events;

      return view('events.dashboard', ['events' => $events]);
    }

    public function destroy(Event $event) {

      // Event::findOrFail($id)->delete();
         $event -> delete();
      return redirect('/dashboard')->with('msg', 'Filme excluído com sucesso!');
    } 

}
