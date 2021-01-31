@extends('layouts.master', ['title' => 'Data Lelang'])

@section('page-heading', 'Data Lelang')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Data Lelang</div>

            <div class="card-body">
                <a href="{{ route('lelang.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Lelang</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Image</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Harga Awal</th>
                            <th>Harga Akhir</th>
                            <th>Pemenang</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lelangs as $lelang)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/'. $lelang->barang->images) }}" alt="" width="70"></td>
                            <td>{{ $lelang->tanggal_lelang }}</td>
                            <td>{{ $lelang->barang->nama_barang }}</td>
                            <td>@currency($lelang->barang->harga_awal)</td>
                            <td>@currency($lelang->harga_akhir)</td>
                            <td>{{ $lelang->user_id }}</td>
                            <td>{{ $lelang->status }}</td>
                            <td>
                                <a href="{{ route('lelang.show', $lelang->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop