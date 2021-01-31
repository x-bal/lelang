<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::get();
        return view('level.index', compact('levels'));
    }

    public function create()
    {
        return view('level.create');
    }

    public function store()
    {
        request()->validate([
            'level' => 'required'
        ]);

        Level::create(request()->all());

        return redirect()->route('level.index')->with('success', 'Level berhasil ditambahkan');
    }

    public function show(Level $level)
    {
        //
    }

    public function edit(Level $level)
    {
        return view('level.edit', compact('level'));
    }

    public function update(Level $level)
    {
        request()->validate([
            'level' => 'required'
        ]);

        $level->update(request()->all());
        return redirect()->route('level.index')->with('success', 'Level berhasil diupdate');
    }

    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('level.index')->with('success', 'Level berhasil dihapus');
    }
}
