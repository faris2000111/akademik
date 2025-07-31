@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Edit Mahasiswa</h1>
    <form action="{{ route('admin.mahasiswa.update', $mahasiswa->nim) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" name="nim" class="form-control" required value="{{ old('nim', $mahasiswa->nim) }}">
            @error('nim')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required value="{{ old('nama', $mahasiswa->nama) }}">
            @error('nama')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $mahasiswa->email) }}">
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="angkatan">Angkatan</label>
            <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan', $mahasiswa->angkatan) }}">
            @error('angkatan')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection 