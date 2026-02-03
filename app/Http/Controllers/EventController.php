<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

use Illuminate\View\View;


class EventController extends Controller
{
    public function index()
    {
        $event = Event::get();
        return view('events.index', compact('event'));
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
        $generatedEvent->date = $request->input('fecha');
        $generatedEvent->description = $request->input('description');
        $generatedEvent->location = $request->input('location');
        $generatedEvent->map = $request->input('map');
        $generatedEvent->hour = $request->input('hour');
        $generatedEvent->type = $request->input('type');
        $generatedEvent->tags = $request->input('tags');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
}
