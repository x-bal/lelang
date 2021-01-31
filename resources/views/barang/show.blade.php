@extends('layouts.master', ['title' => 'Detail Barang'])

@section('page-heading', 'Detail Barang')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session('failed'))
        <div class="alert alert-danger">{{ session('failed') }}</div>
        @endif
        <div class="card">
            <div class="card-header">Detail Barang</div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('storage/' . $barang->images) }}" alt="" width="200px">
                    </div>
                    <div class="col-md-6 mb-3">
                        <b>Nama Barang : </b> {{ $barang->nama_barang }} <br>
                        <b>Harga Awal : </b> @currency($barang->harga_awal) <br>
                        <b>Tanggal : </b> {{ $barang->created_at }} <br>
                        <b>Deskripsi : </b> {{ $barang->deskripsi }}
                    </div>
                    @if(auth()->user()->level_id == 3)
                    <div class="col-md-3">
                        <form action="{{ route('lelang.ajukan') }}" method="post">
                            @csrf
                            <input type="hidden" name="lelang_id" value="{{ $barang->lelang->id }}">
                            <div class="form-group">
                                <label for="tawaran">Ajukan Penawaran</label>
                                <input type="number" name="tawaran" id="tawaran" class="form-control">

                                @error('tawaran')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary">Ajukan</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if($barang->lelang == true)
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Data Penawaran Barang</div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga Awal</th>
                                <th>Penawaran</th>
                                <th>Nama Penawar</th>
                                @if(auth()->user()->level_id == 1)
                                <th>Opsi</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($historyLelang as $penawaran)
                            <tr>
                                <td></td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $penawaran->lelang->barang->nama_barang }}</td>
                                <td>@currency($penawaran->lelang->barang->harga_awal)</td>
                                <td>@currency($penawaran->penawaran_harga)</td>
                                <td>{{ $penawaran->user->masyarakat->nama }}</td>
                                @if(auth()->user()->level_id == 1)
                                <td><a href="" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@stop