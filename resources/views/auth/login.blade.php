@extends('layout.layout')

@section('content')
    <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="username">Nombre de usuario:</label>
        <input type="text" name="username" id="username" value="{{ old('username') }}"><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password"><br>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Recuerdame</label><br>
        <input type="submit" value="Iniciar sesión">

        @if (!empty($error))
            <p>{{ $error }}</p>
        @endif

        {{-- @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif --}}
    </form>
@endsection
