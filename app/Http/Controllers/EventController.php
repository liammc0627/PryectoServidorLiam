<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $generatedEvent = new Event();
        $generatedEvent->name = $request->input('name');
        $generatedEvent->date = $request->input('date');
        $generatedEvent->description = $request->input('description');
        $generatedEvent->location = $request->input('location');
        $generatedEvent->map = $request->input('map');
        $generatedEvent->hour = $request->input('hour');
        $generatedEvent->type = $request->input('type');
        $generatedEvent->tags = '';
        if ($request->has('visible')) {
            $visible = true;
        } else {
            $visible = false;
        }
        $generatedEvent->visible = $visible;
        $generatedEvent->save();

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        $players = Player::where('visible', true)->get();
        $eventPlayers = $event->players->pluck('id')->toArray();
        return view('events.show', compact('event', 'players', 'eventPlayers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $event->name = $request->input('name');
        $event->date = $request->input('date');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->map = $request->input('map');
        $event->hour = $request->input('hour');
        $event->type = $request->input('type');
        $event->tags = $event->tags ?? '';
        if ($request->has('visible')) {
            $visible = true;
        } else {
            $visible = false;
        }
        $event->visible = $visible;
        $event->save();

        return redirect()->route('events.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index');
    }

    /**
     * Toggle like on event
     */
    public function toggleLike(string $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $event = Event::findOrFail($id);
        $user = Auth::user();

        if ($user->likedEvents()->where('event_id', $event->id)->exists()) {
            $user->likedEvents()->detach($event->id);
        } else {
            $user->likedEvents()->attach($event->id);
        }

        return back();
    }

    /**
     * Toggle player in event
     */
    public function togglePlayer(Request $request, string $id)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $event = Event::findOrFail($id);
        $playerId = $request->input('player_id');

        if ($event->players()->where('player_id', $playerId)->exists()) {
            $event->players()->detach($playerId);
        } else {
            $event->players()->attach($playerId);
        }

        return response()->json(['success' => true]);
    }
}

