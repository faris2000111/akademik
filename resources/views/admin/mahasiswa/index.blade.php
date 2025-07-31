@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Daftar Mahasiswa</h1>
    <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $mhs)
            <tr>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->email }}</td>
                <td>{{ $mhs->angkatan }}</td>
                <td>
                    <a href="{{ route('admin.mahasiswa.edit', $mhs->nim) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.mahasiswa.destroy', $mhs->nim) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 