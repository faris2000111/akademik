@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Edit Mata Kuliah</h1>
                    </div>
                </div>
                <div class="sparkline12-graph">
                    <div class="basic-login-form-ad">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="all-form-element-inner">
                                    <form action="{{ route('admin.matakuliah.update', $matakuliah->kode_mk) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Kode Mata Kuliah</label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                    <input type="text" 
                                                           class="form-control" 
                                                           value="{{ $matakuliah->kode_mk }}" 
                                                           readonly>
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
                                                           value="{{ old('nama_mk', $matakuliah->nama_mk) }}" 
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
                                                           value="{{ old('sks', $matakuliah->sks) }}" 
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
                                                           value="{{ old('semester', $matakuliah->semester) }}" 
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
                                                            <i class="fa fa-save"></i> Update
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