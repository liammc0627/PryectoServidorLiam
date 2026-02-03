@extends('layout.layout')

@section('content')
    <a href="{{route('players.create')}}">Crear Jugador</a>
    <h1>Estos son los jugadores del FC Barclona</h1>
    @foreach ($players as $player)
    <a href="{{ route('players.show', $player) }}">{{$player->name}}</a>
    <img src="/storage/{{$player->picture}}" alt="Jugador {{$player->name}}"><br>
    <br><b> {{($player->age)}}<hr></h3>
    <h3><b>Más info</b></h3><br>{{($player->description)}}<hr>
@endforeach
@endsection
