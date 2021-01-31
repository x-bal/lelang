@extends('layouts.master', ['title' => 'Data Petugas'])

@section('page-heading', 'Data Petugas')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Data Petugas</div>

            <div class="card-body">
                <a href="{{ route('petugas.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Petugas</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($petugas as $tgs)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tgs->nama }}</td>
                            <td>{{ $tgs->user->username }}</td>
                            <td>{{ $tgs->user->email }}</td>
                            <td>{{ $tgs->telp }}</td>
                            <td>
                                <a href="{{ route('petugas.edit', $tgs->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('petugas.destroy', $tgs->id) }}" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data petugas?')"><i class="fas fa-trash"></i></button>
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