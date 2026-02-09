@extends('layout.layout')

@section('content')
    @if ($errors->any())
        Hay errores en el formulario: <br>
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    @endif
    <form action="{{ route('events.store') }}" method="post">
        @csrf
        Nombre del evento: <input type="text" name="name"><br>
        Fecha: <input type="date" name="date"><br>
        Localizacion: <input type="text" name="location"><br>
        Mapa: <input type="text" name="map"><br>
        Hora: <input type="time" name="hour"><br>
        Tipo de Evento:
        <select name="type">
            <option value="match">Partido</option>
            <option value="training">Entrenamiento a puertas abiertas</option>
            <option value="charity">Acto benefico</option>
        </select>
        Descripción: <input type="text" name="description"><br>
        Visible <input type="checkbox" name="visible" id="visible" {{ old('visible') ? 'checked' : '' }}>
        <input type="submit" name="Guardar"><br>
    </form>
@endsection
