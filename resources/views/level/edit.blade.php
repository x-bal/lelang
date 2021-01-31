@extends('layouts.master', ['title' => 'Edit Level'])

@section('page-heading', 'Edit Level')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Edit Level</div>

            <div class="card-body">
                <form action="{{ route('level.update', $level->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="text" name="level" id="level" class="form-control" value="{{ $level->level ? $level->level : old('level') }}">

                        @error('level')
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