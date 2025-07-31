@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h2>Edit Dosen</h2>
            <form action="{{ route('admin.dosen.update', $dosen->nip) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" class="form-control" value="{{ $dosen->nip }}" readonly>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $dosen->username) }}">
                    @error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="password">Password (kosongkan jika tidak diubah)</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $dosen->nama) }}">
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $dosen->alamat) }}">
                    @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="text" name="nohp" class="form-control @error('nohp') is-invalid @enderror" value="{{ old('nohp', $dosen->nohp) }}">
                    @error('nohp')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="admin" {{ old('role', $dosen->role)=='admin'?'selected':'' }}>Admin</option>
                        <option value="kaprodi" {{ old('role', $dosen->role)=='kaprodi'?'selected':'' }}>Kaprodi</option>
                        <option value="dosen" {{ old('role', $dosen->role)=='dosen'?'selected':'' }}>Dosen</option>
                    </select>
                    @error('role')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.dosen.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection 