@extends('layouts.master', ['title' => 'Edit User'])

@section('page-heading', 'Edit User')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ $user ? 'Edit User' : 'Tambah User'}}</div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{ $user->username ? $user->username : old('username') }}">

                        @error('username')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->petugas->nama }}">

                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $user->email ? $user->email : old('email') }}">

                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">

                        @error('password')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="level_id">Level</label>
                        <select name="level_id" id="level_id" class="form-control form-select">
                            <option disabled selected>-- Pilih Level --</option>
                            @foreach($levels as $level)
                            @if($user->level_id == $level->id)
                            <option selected value="{{ $level->id }}">{{ $level->level }}</option>
                            @else
                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                            @endif
                            @endforeach
                        </select>

                        @error('level_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">{{ $user ? 'Update' : 'Tambah' }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop