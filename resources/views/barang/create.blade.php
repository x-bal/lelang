@extends('layouts.master', ['title' => 'Tambah Barang'])

@section('page-heading', 'Tambah Barang')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Tambah Barang</div>

            <div class="card-body">
                <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang') }}">

                        @error('nama_barang')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_awal">Harga Awal</label>
                        <input type="number" name="harga_awal" id="harga_awal" class="form-control" value="{{ old('harga_awal') }}">

                        @error('harga_awal')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"></textarea>

                        @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" name="images" id="images" class="form-control form-control-file">

                        @error('images')
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