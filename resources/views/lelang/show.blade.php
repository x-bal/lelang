@extends('layouts.master', ['title' => 'History Lelang'])

@section('page-heading', 'History Lelang')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">History Lelang</div>

            <div class="card-body">
                <div class="row">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga Awal</th>
                                <th>Penawaran</th>
                                <th>Nama Penawar</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($historyLelang as $history)
                            <tr>
                                <td></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $history->lelang->barang->nama_barang }}</td>
                                <td>@currency($history->lelang->barang->harga_awal)</td>
                                <td>@currency($history->penawaran_harga)</td>
                                <td>{{ $history->user->masyarakat->nama }}</td>
                                <td>
                                    <form action="{{ route('lelang.choose', $history->lelang_id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="harga_akhir" value="{{ $history->penawaran_harga }}">
                                        <input type="hidden" name="user_id" value="{{ $history->user_id }}">

                                        <button type="submit" class="btn btn-sm btn-primary" onclick="return confirm('Pilih Sebagai Pemenang?')"><i class="fas fa-check"></i></button>
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
</div>

@stop