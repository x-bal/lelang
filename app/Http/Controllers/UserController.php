<?php

namespace App\Http\Controllers;

use App\Models\{User, Level};

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('level')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $levels = Level::get();
        return view('users.create', compact('levels'));
    }

    public function store()
    {
        request()->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required:min:5',
            'level_id' => 'required'
        ]);

        $input = request()->all();
        $input['password'] = bcrypt(request('password'));

        $user = User::create($input);

        if (request('level_id') == 2) {
            $user->petugas()->create([
                'nama' => request('nama')
            ]);
        }


        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::with('petugas')->where('id', $id)->first();
        $levels = Level::get();
        return view('users.edit', compact('user', 'levels'));
    }

    public function update(User $user)
    {
        request()->validate([
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'level_id' => 'required'
        ]);

        $input = request()->all();

        if (request('password') == null) {
            $input['password'] = $user->password;
        } else {
            $input['password'] = bcrypt('password');
        }

        if (request('level_id') == 2) {
            $user->petugas->update([
                'nama' => request('nama')
            ]);
        }

        $user->update($input);
        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
    }

    public function destroy(User $user)
    {
        if ($user->level_id == 2) {
            $user->petugas->delete();
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
