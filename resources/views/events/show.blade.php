@extends('layout.layout')

@section('content')
<h1>{{ $event->name }}</h1>

<div class="event-details">
    <p><strong>Fecha:</strong> {{ $event->date }}</p>
    <p><strong>Hora:</strong> {{ $event->hour }}</p>
    <p><strong>Ubicación:</strong> {{ $event->location }}</p>
    <p><strong>Tipo:</strong> {{ $event->type }}</p>
    <p><strong>Descripción:</strong></p>
    <p>{{ $event->description }}</p>

    @if($event->map)
        <p><strong>Mapa:</strong><br>
        {{ $event->map }}</p>
    @endif

    @if($event->tags)
        <p><strong>Tags:</strong> {{ $event->tags }}</p>
    @endif
</div>

<div class="event-actions">
    <!-- Botón Me Gusta -->
    @auth
        <form action="{{ route('events.toggleLike', $event->id) }}" method="POST" style="display:inline;">
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
            <a href="{{ route('events.edit', $event->id) }}">Editar Evento</a>
            <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Estás seguro?')">Eliminar Evento</button>
            </form>
        @endif
    @endauth
</div>

<!-- Sección de Jugadores -->
@auth
    @if(Auth::user()->role === 'admin')
        <h2>Gestionar Jugadores del Evento</h2>

        <h3>Jugadores disponibles para agregar:</h3>
        <form id="form-agregar-jugador">
            @csrf
            <select name="player_id" id="player_select" required>
                <option value="">-- Selecciona un jugador --</option>
                @foreach($players as $player)
                    @if(!in_array($player->id, $eventPlayers))
                        <option value="{{ $player->id }}">{{ $player->name }}</option>
                    @endif
                @endforeach
            </select>
            <button type="submit">Agregar Jugador</button>
        </form>

        <h3>Jugadores en el evento:</h3>
        @if($event->players->count() > 0)
            <ul>
                @foreach($event->players as $player)
                    <li>
                        {{ $player->name }}
                        <form action="{{ route('events.togglePlayer', $event->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="player_id" value="{{ $player->id }}">
                            <button type="submit">Eliminar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay jugadores asignados a este evento.</p>
        @endif
    @endif
@endauth

<a href="{{ route('events.index') }}">Volver a Eventos</a>

<script>
    document.getElementById('form-agregar-jugador')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const playerId = document.getElementById('player_select').value;

        fetch('{{ route("events.togglePlayer", $event->id) }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ player_id: playerId })
        })
        .then(() => location.reload())
        .catch(err => console.error(err));
    });
</script>

@endsection
