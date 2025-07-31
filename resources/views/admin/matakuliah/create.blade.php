@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Tambah Mata Kuliah</h1>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="all-form-element-inner">
                                    <form action="{{ route('admin.matakuliah.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Kode Mata Kuliah</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" 
                                                           class="form-control" 
                                                           name="kode_mk" 
                                                           value="{{ old('kode_mk') }}" 
                                                           placeholder="Masukkan kode mata kuliah"
                                                           maxlength="10"
                                                           required>
                                                    @error('kode_mk')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Nama Mata Kuliah</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" 
                                                           class="form-control" 
                                                           name="nama_mk" 
                                                           value="{{ old('nama_mk') }}" 
                                                           placeholder="Masukkan nama mata kuliah"
                                                           maxlength="100"
                                                           required>
                                                    @error('nama_mk')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">SKS</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="number" 
                                                           class="form-control" 
                                                           name="sks" 
                                                           value="{{ old('sks') }}" 
                                                           placeholder="Masukkan jumlah SKS"
                                                           min="1"
                                                           max="6"
                                                           required>
                                                    @error('sks')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Semester</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="number" 
                                                           class="form-control" 
                                                           name="semester" 
                                                           value="{{ old('semester') }}" 
                                                           placeholder="Masukkan semester"
                                                           min="1"
                                                           max="8"
                                                           required>
                                                    @error('semester')
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
                                                        <a href="{{ route('admin.matakuliah.index') }}" class="btn btn-sm btn-default">
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