@extends('layouts.master', ['title' => 'Data Masyarakat'])

@section('page-heading', 'Data Masyarakat')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Data Masyarakat</div>

            <div class="card-body">
                <a href="{{ route('masyarakat.create') }}" class="btn btn-sm btn-primary mb-3">Tambah Masyarakat</a>
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
                        @foreach($masyarakat as $tgs)
                        <tr>
                            <td></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tgs->nama }}</td>
                            <td>{{ $tgs->user->username }}</td>
                            <td>{{ $tgs->user->email }}</td>
                            <td>{{ $tgs->telp }}</td>
                            <td>
                                <a href="{{ route('masyarakat.edit', $tgs->id) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('masyarakat.destroy', $tgs->id) }}" method="post" style="display: inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data masyarakat?')"><i class="fas fa-trash"></i></button>
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