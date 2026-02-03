@extends('layout.layout')

@section('content')
    @if ($errors->any())
        <div style="color: red;">
            Hay errores en el formulario: <br>
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    <form action="{{ route('players.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        Nombre: <input type="text" name="name" value="{{ old('name') }}">
        <hr>

        Edad: <input type="text" name="age" value="{{ old('age') }}">
        <hr>

        Twitter: <input type="text" name="twitter" value="{{ old('twitter') }}">
        <hr>

        Instagram: <input type="text" name="instagram" value="{{ old('instagram') }}">
        <hr>

        Twitch: <input type="text" name="twitch" value="{{ old('twitch') }}">
        <hr>

        Posición:
        <select name="position">
            <option value="DEL" value="{{ old('position') }}">DEL</option>
            <option value="MED" value="{{ old('position') }}">MED</option>
            <option value="DEF" value="{{ old('position') }}">DEF</option>
            <option value="POR" value="{{ old('position') }}">POR</option>
        </select>
        <hr>

        Descripción: <input type="text" name="description" value="{{ old('description') }}">
        <hr>

        {{-- Para el checkbox, comprobamos si 'visible' estaba marcado --}}
        Visible <input type="checkbox" name="visible" id="visible" {{ old('visible') ? 'checked' : '' }}>
        <hr>

        <input type="file" name="picture" id="picture"><br>
        <small>(Nota: Por seguridad, los archivos deben seleccionarse de nuevo siempre)</small>
        <br>

        <input type="submit" value="Guardar">
    </form>
@endsection
