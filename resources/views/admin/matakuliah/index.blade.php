@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Data Mata Kuliah</h1>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="all-form-element-inner">
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <a href="{{ route('admin.matakuliah.create') }}" class="btn btn-primary">
                                                    <i class="fa fa-plus"></i> Tambah Mata Kuliah
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Kode MK</th>
                                                                <th>Nama Mata Kuliah</th>
                                                                <th>SKS</th>
                                                                <th>Semester</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($matakuliah as $index => $mk)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $mk->kode_mk }}</td>
                                                                <td>{{ $mk->nama_mk }}</td>
                                                                <td>{{ $mk->sks }}</td>
                                                                <td>{{ $mk->semester }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.matakuliah.show', $mk->kode_mk) }}" 
                                                                       class="btn btn-info btn-sm">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.matakuliah.edit', $mk->kode_mk) }}" 
                                                                       class="btn btn-warning btn-sm">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <form action="{{ route('admin.matakuliah.destroy', $mk->kode_mk) }}" 
                                                                          method="POST" 
                                                                          style="display: inline-block;"
                                                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td colspan="6" class="text-center">Tidak ada data mata kuliah</td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 