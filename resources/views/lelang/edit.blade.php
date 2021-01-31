@extends('layouts.master', ['title' => 'Edit Barang'])

@section('page-heading', 'Edit Barang')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Barang</div>

            <div class="card-body">
                <form action="{{ route('barang.update', $barang->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ $barang->nama_barang }}">

                        @error('nama_barang')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_awal">Harga Awal</label>
                        <input type="number" name="harga_awal" id="harga_awal" class="form-control" value="{{ $barang->harga_awal }}">

                        @error('harga_awal')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control">{{ $barang->deskripsi }}</textarea>

                        @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="images">Images</label>
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $barang->images) }}" alt="" width="100">
                        </div>
                        <input type="file" name="images" id="images" class="form-control form-control-file">

                        @error('images')
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