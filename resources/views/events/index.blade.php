@extends('layout.layout')

@section('content')
<h1>Eventos</h1>

@auth
    @if(Auth::user()->role === 'admin')
        <a href="{{route('events.create')}}">Crear Evento</a><br><br>
    @endif
@endauth

<div class="events-list">
    @foreach ($events as $event)
        <div class="event-card">
            <h3>{{ $event->name }}</h3>
            <p><strong>Fecha:</strong> {{ $event->date }}</p>
            <p><strong>Hora:</strong> {{ $event->hour }}</p>
            <p><strong>Ubicación:</strong> {{ $event->location }}</p>
            <p><strong>Descripción:</strong> {{ $event->description }}</p>

            <div class="event-actions">
                <!-- Ver ficha del evento -->
                @auth
                    <a href="{{ route('events.show', $event->id) }}">Ver detalles</a>
                @endauth

                <!-- Botón Me Gusta -->
                @auth
                    <form action="{{ route('events.toggleLike', $event->id) }}" method="POST"">
                        @csrf
                        @if(Auth::user()->likedEvents()->where('event_id', $event->id)->exists())
                            <button type="submit">❤️ Eliminar Me Gusta</button>
                        @else
                            <button type="submit">🤍 Me Gusta</button>
                        @endif
                    </form>
                @endauth

                <!-- Enlaces Admin -->
                @auth
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('events.edit', $event->id) }}">Editar</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    @endif
                @endauth
            </div>
            <hr>
        </div>
    @endforeach
</div>

@endsection
