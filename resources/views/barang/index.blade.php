@extends('layouts.master', ['title' => 'Data Barang'])

@section('page-heading', 'Data Barang')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Data Barang</div>

            <div class="card-body">
                <a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Barang</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Image</th>
                            <th>Nama Barang</th>
                            <th>Harga Awal</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barang as $brg)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/' . $brg->images) }}" alt="" width="70px"></td>
                            <td>{{ $brg->nama_barang }}</td>
                            <td>@currency($brg->harga_awal)</td>
                            <td>{{ $brg->deskripsi }}</td>
                            <td>
                                <a href="{{ route('barang.show', $brg->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('barang.edit', $brg->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('barang.destroy', $brg->id) }}" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus barang?')"><i class="fas fa-trash"></i></button>
                                </form>
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