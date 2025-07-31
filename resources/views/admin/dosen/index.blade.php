@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2>Daftar Dosen</h2>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <a href="{{ route('admin.dosen.create') }}" class="btn btn-primary mb-3">Tambah Dosen</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosen as $d)
                    <tr>
                        <td>{{ $d->nip }}</td>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->alamat }}</td>
                        <td>{{ $d->nohp }}</td>
                        <td>{{ ucfirst($d->role) }}</td>
                        <td>
                            <a href="{{ route('admin.dosen.edit', $d->nip) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.dosen.destroy', $d->nip) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus dosen?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 