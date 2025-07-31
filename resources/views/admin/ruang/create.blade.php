@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Tambah Ruang</h1>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="all-form-element-inner">
                                    <form action="{{ route('admin.ruang.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Nama Ruang</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" 
                                                           class="form-control" 
                                                           name="nama_ruang" 
                                                           value="{{ old('nama_ruang') }}" 
                                                           placeholder="Masukkan nama ruang"
                                                           maxlength="50"
                                                           required>
                                                    @error('nama_ruang')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit">
                                                            <i class="fa fa-save"></i> Simpan
                                                        </button>
                                                        <a href="{{ route('admin.ruang.index') }}" class="btn btn-sm btn-default">
                                                            <i class="fa fa-arrow-left"></i> Kembali
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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