@extends('layout.layout')

@section('content')
    <form action="{{ route('signup') }}" method="post">
        @csrf
        <label for="username">Nombre de usuario:</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}"><br>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}"><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password"><br>
        <label for="password_confirmation">Confirmar contraseña:</label>
        <input type="password" name="password_confirmation" id="password_confirmation"><br>

        <input type="submit" value="Registrarse">

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
@endsection
