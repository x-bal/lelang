@extends('layouts.master', ['title' => 'Dashboard'])

@section('page-heading', 'Dashboard')

@section('content')
@if(auth()->user()->level_id == 3)
@if(auth()->user()->masyarakat->telp == null)
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">Silahkan lengkapi data dibawah</div>

            <div class="card-body">
                <form action="{{ route('masyarakat.update', auth()->user()->masyarakat->id) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="{{  auth()->user()->username }}">

                        @error('username')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{  auth()->user()->masyarakat->nama }}">

                        @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{  auth()->user()->email }}">

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
                        <input type="number" name="telp" id="telp" class="form-control" value="{{  auth()->user()->masyarakat->telp }}">

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
@else
<div class="row">
    @foreach($lelangs as $brg)
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-content">
                <img class="card-img-top img-fluid" src="{{ asset('storage/' . $brg->barang->images) }}" alt="Card image cap" style="height: 18rem; object-fit: cover; object-position: center;">
                <div class="card-body">
                    <h4 class="card-title">{{ $brg->barang->nama_barang }}</h4>
                    <span class="badge bg-primary">@currency($brg->barang->harga_awal)</span>
                    <p class="card-text pt-3 pb-2 text-secondary">
                        {{ Str::limit($brg->barang->deskripsi, 30) }}

                        <a href="{{ route('barang.show', $brg->barang->id) }}">Selengkapnya</a>
                    </p>

                    <!-- <a href="" class="btn btn-sm btn-info">Detail</a> -->
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex">
    {!! $lelangs->links() !!}
</div>
@endif
@else
<div class="row">
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="stats-icon purple">
                            <i class='fas fa-users'></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h6 class="text-muted font-semibold">Jumlah Users</h6>
                        <h6 class='font-extrabold mb-0'>{{ $users }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="stats-icon blue">
                            <i class='fas fa-briefcase'></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h6 class="text-muted font-semibold">Jumlah Barang</h6>
                        <h6 class='font-extrabold mb-0'>{{ $barang }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-3">
                        <div class="stats-icon green">
                            <i class='fab fa-uncharted'></i>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <h6 class="text-muted font-semibold">Jumlah Lelang</h6>
                        <h6 class='font-extrabold mb-0'>{{ $lelang }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-2">
                        <div class="stats-icon yellow">
                            <i class='fab fa-uncharted'></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Jumlah Petugas</h6>
                        <h6 class='font-extrabold mb-0'>{{ $petugas }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-2">
                        <div class="stats-icon red">
                            <i class='fab fa-uncharted'></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Jumlah Masyarakat</h6>
                        <h6 class='font-extrabold mb-0'>{{ $masyarakat }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@stop