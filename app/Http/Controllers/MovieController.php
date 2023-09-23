<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $Movies = Movie::all();
      return response()-> json($Movies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Movie = new Movie();
        $Movie -> title = $request -> title;
        $Movie -> description = $request -> description;
        $Movie -> save();
        return response() -> json($Movie);
    }

    /**
     * Display the specified resource.
     */
    public function show_simples(string $id)
    {
        $Movie = Movie::find($id);
        return response() -> json($Movie);
    }


    /**
     * Display the specified resource.
     */
    public function show_avancado(Movie $movie)
    {
        return response() -> json($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $Movie)
    {
        $Movie -> title = 'Senhor dos Aneis';
        $Movie -> description = 'Teste';
        $Movie -> update();
        return response() -> json($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $Movie -> destroy();
        return response() -> json(['message' => 'Filme deletado com sucesso']);
    }
}
