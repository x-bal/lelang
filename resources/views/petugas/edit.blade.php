@extends('layouts.master', ['title' => 'Edit Petugas'])

@section('page-heading', 'Edit Petugas')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Petugas</div>
            <div class="card-body">
                <form action="{{ route('petugas.update', $petugas->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{  $petugas->user->username }}">

                        @error('username')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $petugas->nama }}">

                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $petugas->user->email }}">

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
                        <label for="telp">No Telp</label>
                        <input type="number" name="telp" id="telp" class="form-control" value="{{ $petugas->telp }}">

                        @error('telp')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop