@extends('layouts.main')

@section('title', 'Movies THG')

@section('content')

<div id='search-container' clas='col-md-12'>
    <h1>Busque um filme</h1>
    <form action="/" method='GET'>
        <input type="text" id='search' name='search' class='form-control' placeholder='Procurar'>
    </form>
</div>

<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{$search}}</h2>
    @else
    <h2>Próximas estreias</h2>
    <p class="subtitle">Veja os filmes dos próximos dias</p>
    @endif
    <div id='cards-container' class='row'>
        @foreach($events as $event)
        <div class="card col-md3">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title}}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/y', strtotime($event->date))}}</p>
                <h5 class="card-title">{{ $event->title  }}</h5>
                <a href="/events/{{$event->id}}" class='btn btn-primary'>Saber mais</a>
            </div>
        </div>    
        @endforeach
        @if(count($events) == 0 && $search)
         <p>Não foi possível encontrar nenhum filme com nome de {{$search}}! <a href="/">Ver todos</a></p>
         @elseif(count($events) == 0)
         <p>Não há filmes disponíveis</p>
        @endif
    </div>
</div>

@endsection