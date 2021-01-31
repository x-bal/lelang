<?php

namespace App\Http\Controllers;

use App\Models\{Petugas, User};

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::with('user')->get();
        return view('petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.create');
    }

    public function store()
    {
        request()->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required:min:5',
            'telp' => 'required',
        ]);

        $input = request()->all();

        $input['password'] = bcrypt(request('password'));
        $input['level_id'] = 2;

        $user = User::create($input);

        $user->petugas()->create([
            'nama' => request('nama'),
            'telp' => request('telp')
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan');
    }

    public function show(Petugas $petugas)
    {
    }

    public function edit($id)
    {
        $petugas = Petugas::with('user')->where('id', $id)->first();
        return view('petugas.edit', compact('petugas'));
    }

    public function update($id)
    {
        $petugas = Petugas::with('user')->where('id', $id)->firstOrFail();

        request()->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $petugas->user->id,
            'telp' => 'required',
        ]);

        $input = request()->all();

        if (request('password') == null) {
            $input['password'] = $petugas->user->password;
        } else {
            $input['password'] = bcrypt(request('password'));
        }

        $petugas->user->update($input);
        $petugas->update([
            'nama' => request('nama'),
            'telp' => request('telp'),
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil diupdate');
    }

    public function destroy($id)
    {
        $petugas = Petugas::with('user')->where('id', $id)->firstOrFail();
        $petugas->user()->delete();
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil dihapus');
    }
}
