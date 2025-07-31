@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Absensi Mahasiswa</h1>
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

                                    <form method="GET" action="">
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Mata Kuliah</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <select name="kode_mk" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Pilih Mata Kuliah</option>
                                                        @foreach($matakuliah as $mk)
                                                            <option value="{{ $mk->kode_mk }}" {{ $selectedMatkul == $mk->kode_mk ? 'selected' : '' }}>
                                                                {{ $mk->kode_mk }} - {{ $mk->nama_mk }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Golongan</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <select name="id_gol" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Pilih Golongan</option>
                                                        @foreach($golongan as $gol)
                                                            <option value="{{ $gol->id }}" {{ $selectedGolongan == $gol->id ? 'selected' : '' }}>
                                                                {{ $gol->nama_gol }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                    <label class="login2 pull-right pull-right-pro">Ruang</label>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                    <select name="id_ruang" class="form-control" onchange="this.form.submit()">
                                                        <option value="">Pilih Ruang</option>
                                                        @foreach($ruang as $rng)
                                                            <option value="{{ $rng->id }}" {{ $selectedRuang == $rng->id ? 'selected' : '' }}>
                                                                {{ $rng->nama_ruang }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    @if($mahasiswas->count() > 0)
                                    <form method="POST" action="{{ url()->current() }}">
                                        @csrf
                                        <input type="hidden" name="kode_mk" value="{{ $selectedMatkul }}">
                                        <input type="hidden" name="id_gol" value="{{ $selectedGolongan }}">
                                        <input type="hidden" name="id_ruang" value="{{ $selectedRuang }}">
                                        
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th width="50">Absen</th>
                                                                    <th>NIM</th>
                                                                    <th>Nama Mahasiswa</th>
                                                                    <th>Semester</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($mahasiswas as $mhs)
                                                                <tr>
                                                                    <td>
                                                                        <input type="checkbox" name="nim[]" value="{{ $mhs->nim }}" checked>
                                                                    </td>
                                                                    <td>{{ $mhs->nim }}</td>
                                                                    <td>{{ $mhs->nama }}</td>
                                                                    <td>{{ $mhs->semester }}</td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                        <button type="submit" class="btn btn-success">
                                                            <i class="fa fa-save"></i> Simpan Absensi
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @elseif($selectedMatkul && $selectedGolongan && $selectedRuang)
                                    <div class="form-group-inner">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="alert alert-info">
                                                    Tidak ada mahasiswa yang mengambil mata kuliah ini pada golongan dan ruang yang dipilih.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
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