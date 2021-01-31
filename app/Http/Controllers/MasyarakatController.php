<?php

namespace App\Http\Controllers;

use App\Models\{Masyarakat, User};

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::with('user')->get();
        return view('masyarakat.index', compact('masyarakat'));
    }

    public function create()
    {
        return view('masyarakat.create');
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
        $input['level_id'] = 3;

        $user = User::create($input);

        $user->masyarakat()->create([
            'nama' => request('nama'),
            'telp' => request('telp')
        ]);

        return redirect()->route('masyarakat.index')->with('success', 'Masyarakat berhasil ditambahkan');
    }

    public function show(masyarakat $masyarakat)
    {
    }

    public function edit($id)
    {
        $masyarakat = masyarakat::with('user')->where('id', $id)->first();
        return view('masyarakat.edit', compact('masyarakat'));
    }

    public function update($id)
    {
        $masyarakat = Masyarakat::with('user')->where('id', $id)->firstOrFail();

        request()->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $masyarakat->user->id,
            'telp' => 'required',
        ]);

        $input = request()->all();

        if (request('password') == null) {
            $input['password'] = $masyarakat->user->password;
        } else {
            $input['password'] = bcrypt(request('password'));
        }

        $masyarakat->user->update($input);
        $masyarakat->update([
            'nama' => request('nama'),
            'telp' => request('telp'),
        ]);
        if (auth()->user()->level_id == 1) {
            return redirect()->route('masyarakat.index')->with('success', 'Masyarakat berhasil diupdate');
        } else {
            return redirect()->route('dashboard.index')->with('success', 'Masyarakat berhasil diupdate');
        }
    }

    public function destroy($id)
    {
        $masyarakat = masyarakat::with('user')->where('id', $id)->firstOrFail();
        $masyarakat->user()->delete();
        $masyarakat->delete();
        return redirect()->route('masyarakat.index')->with('success', 'Masyarakat berhasil dihapus');
    }
}
