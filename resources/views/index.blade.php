@extends('layouts.main')

@section('content')

<!-- About Akademik Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset ('frontend/img/about.jpg')}}" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">Sistem Informasi Akademik</h6>
                <h1 class="mb-4">Selamat Datang di Portal Akademik</h1>
                <p class="mb-4">Portal Akademik Perkuliahan ini menyediakan berbagai informasi terkait kegiatan akademik, jadwal perkuliahan, pengumuman, dan layanan administrasi kampus.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Informasi Mata Kuliah</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Jadwal Perkuliahan</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Pengumuman Akademik</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Layanan Administrasi</p>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="#">Login Mahasiswa</a>
                <a class="btn btn-outline-primary py-3 px-5 mt-2 ms-2" href="#">Lihat Jadwal</a>
            </div>
        </div>
    </div>
</div>
<!-- About Akademik End -->

<!-- Kategori Mata Kuliah Start -->
<div class="container-xxl py-5 category">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Kategori</h6>
            <h1 class="mb-5">Kategori Mata Kuliah</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-7 col-md-6">
                <div class="row g-3">
                    <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative d-block overflow-hidden">
                            <img class="img-fluid" src="{{ asset('frontend/img/cat-1.jpg') }}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Teknik Informatika</h5>
                                <small class="text-primary">20 Mata Kuliah</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                        <div class="position-relative d-block overflow-hidden">
                            <img class="img-fluid" src="{{ asset('frontend/img/cat-2.jpg') }}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Sistem Informasi</h5>
                                <small class="text-primary">18 Mata Kuliah</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                        <div class="position-relative d-block overflow-hidden">
                            <img class="img-fluid" src="{{ asset('frontend/img/cat-3.jpg') }}" alt="">
                            <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                <h5 class="m-0">Manajemen</h5>
                                <small class="text-primary">15 Mata Kuliah</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                <div class="position-relative d-block h-100 overflow-hidden">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('frontend/img/cat-4.jpg') }}" alt="" style="object-fit: cover;">
                    <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                        <h5 class="m-0">Ekonomi</h5>
                        <small class="text-primary">12 Mata Kuliah</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kategori Mata Kuliah End -->

<!-- Pengumuman Akademik Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Pengumuman</h6>
            <h1 class="mb-5">Pengumuman Akademik Terbaru</h1>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8 col-md-10 wow fadeInUp" data-wow-delay="0.1s">
                <div class="alert alert-info mb-3">
                    <strong>Libur Nasional:</strong> Perkuliahan diliburkan pada tanggal 17 Agustus 2024 dalam rangka Hari Kemerdekaan RI.
                </div>
                <div class="alert alert-warning mb-3">
                    <strong>Pengisian KRS:</strong> Pengisian KRS online dibuka mulai 1 - 7 September 2024.
                </div>
                <div class="alert alert-success mb-3">
                    <strong>Wisuda:</strong> Pendaftaran wisuda gelombang 2 dibuka hingga 30 September 2024.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pengumuman Akademik End -->

@endsection