@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Data Ruang</h1>
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
                                                <a href="{{ route('admin.ruang.create') }}" class="btn btn-primary">
                                                    <i class="fa fa-plus"></i> Tambah Ruang
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
                                                                <th>Nama Ruang</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($ruang as $index => $rng)
                                                            <tr>
                                                                <td>{{ $index + 1 }}</td>
                                                                <td>{{ $rng->nama_ruang }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.ruang.show', $rng->id) }}" 
                                                                       class="btn btn-info btn-sm">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                    <a href="{{ route('admin.ruang.edit', $rng->id) }}" 
                                                                       class="btn btn-warning btn-sm">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <form action="{{ route('admin.ruang.destroy', $rng->id) }}" 
                                                                          method="POST" 
                                                                          style="display: inline-block;"
                                                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus ruang ini?')">
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
                                                                <td colspan="3" class="text-center">Tidak ada data ruang</td>
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