@extends('layouts.main')

@section('title', 'Adicione um Filme')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Adicione seu filme</h1>
    <form action="/events" method='POST' enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="image">Capa do Filme:</label>
            <input type="file" id='image' name='image' class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Filme:</label>
            <input type="text" class="form-control" id='title' name='title' placeholder='Nome do filme'>
        </div>
        <div class="form-group">
            <label for="data">Data de estreia:</label>
            <input type="date" class="form-control" id='date' name='date'>
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id='city' name='city' placeholder='Local do filme (Cinema)'>
        </div>
        <div class="form-group">
            <label for="title">O evento é privado?</label>
            <select name="private" id="private" class='form-control'>
            <option value="1">Sim</option>
            <option value="0">Não</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Sinopse:</label>
            <textarea name="description" id="description" class='form-control'></textarea>
        </div>
        <input type="submit" class='btn btn-primary' value='Adicionar Filme'>
    </form>
</div>

@endsection