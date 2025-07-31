@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline12-list">
                <div class="sparkline12-hd">
                    <div class="main-sparkline12-hd">
                        <h1>Absensi Kehadiran Dosen</h1>
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
                                                <div class="alert alert-info">
                                                    <h4><i class="fa fa-info-circle"></i> Informasi Absensi</h4>
                                                    <p>Silakan klik tombol di bawah untuk melakukan absensi kehadiran hari ini.</p>
                                                    <p><strong>Catatan:</strong> Anda hanya dapat melakukan absensi sekali per hari.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ url()->current() }}">
                                        @csrf
                                        <div class="form-group-inner">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                        <button type="submit" class="btn btn-primary btn-lg">
                                                            <i class="fa fa-clock-o"></i> Absen Sekarang
                                                        </button>
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