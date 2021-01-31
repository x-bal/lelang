@extends('layouts.master', ['title' => 'Tambah Level'])

@section('page-heading', 'Tambah Level')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Tambah Level</div>

            <div class="card-body">
                <form action="{{ route('level.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="text" name="level" id="level" class="form-control" value="{{ old('level') }}">

                        @error('level')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop