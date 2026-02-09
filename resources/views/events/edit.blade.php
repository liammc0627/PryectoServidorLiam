@extends('layout.layout')

@section('content')
<h1>Editar Evento</h1>

<form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nombre del Evento:</label>
    <input type="text" id="name" name="name" value="{{ $event->name }}" required><br><br>

    <label for="date">Fecha:</label>
    <input type="date" id="date" name="date" value="{{ $event->date }}" required><br><br>

    <label for="hour">Hora:</label>
    <input type="time" id="hour" name="hour" value="{{ $event->hour }}" required><br><br>

    <label for="location">Ubicación:</label>
    <input type="text" id="location" name="location" value="{{ $event->location }}" required><br><br>

    <label for="type">Tipo de Evento:</label>
    <input type="text" id="type" name="type" value="{{ $event->type }}"><br><br>

    <label for="description">Descripción:</label>
    <textarea id="description" name="description" required>{{ $event->description }}</textarea><br><br>

    <label for="map">Mapa:</label>
    <textarea id="map" name="map">{{ $event->map }}</textarea><br><br>

    <label for="tags">Tags:</label>
    <input type="text" id="tags" name="tags" value="{{ $event->tags }}"><br><br>

    <label for="visible">
        <input type="checkbox" id="visible" name="visible" @if($event->visible) checked @endif>
        Visible
    </label><br><br>

    <button type="submit">Guardar Cambios</button>
    <a href="{{ route('events.show', $event->id) }}">Cancelar</a>
</form>

@endsection
