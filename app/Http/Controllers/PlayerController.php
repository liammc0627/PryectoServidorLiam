<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Requests\PlayerRequest;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::get();
        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $players = Player::get();
        return view('players.create', compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerRequest $request)
    {
        $generatedPlayer = new Player();
        $generatedPlayer->name = $request->input('name');
        $generatedPlayer->age = $request->input('age');
        $generatedPlayer->position = $request->input('position');
        $generatedPlayer->description = $request->input('description');
        $generatedPlayer->picture = $request->file('picture')->store('img/players','public');
        $generatedPlayer->twitter = $request->input('twitter');
        $generatedPlayer->instagram = $request->input('instagram');
        $generatedPlayer->twitch = $request->input('twitch');
        if ($request->has('visible')) {
        $visible = true;
        } else {
        $visible = false;
    }
    $generatedPlayer->visible = $visible;

        $generatedPlayer->save();
        return redirect()->route('players.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        return view('players.show', compact('player'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
