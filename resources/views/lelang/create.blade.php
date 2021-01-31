@extends('layouts.master', ['title' => 'Tambah Lelang'])

@section('page-heading', 'Tambah Lelang')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Tambah Lelang</div>

            <div class="card-body">
                <form action="{{ route('lelang.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="barang_id">Pilih Barang</label>
                        <select name="barang_id" id="barang_id" class="form-control">
                            <option disabled selected>-- Pilih Barang --</option>
                            @foreach($barang as $brg)
                            @if($brg->lelang == null)
                            <option value="{{ $brg->id }}">{{ $brg->nama_barang }}</option>
                            @endif
                            @endforeach
                        </select>

                        @error('barang_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lelang">Tanggal Lelang</label>
                        <input type="date" name="tanggal_lelang" id="tanggal_lelang" class="form-control">

                        @error('tanggal_lelang')
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