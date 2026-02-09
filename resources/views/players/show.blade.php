@extends('layout.layout')

@section('content')
    <a href="{{ route('players.index') }}">Inicio</a>
    <h1>{{ $player->name }}</h1>
    <img class="imgPlayer" src="/storage/{{ $player->picture }}" alt="Jugador {{ $player->name }}">
    <h3>Edad: {{ $player->age }}</h3>
    <hr>
    <h3>Más info</h3>
    <p>{{ $player->description }}</p>

@endsection
