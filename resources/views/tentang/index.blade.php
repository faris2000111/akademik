@extends('layouts.main')

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Tentang Sistem Akademik</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Beranda</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Tentang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-calendar-alt text-primary mb-4"></i>
                        <h5 class="mb-3">Manajemen Jadwal Kuliah</h5>
                        <p>Mengelola jadwal perkuliahan secara efisien dan terintegrasi untuk mahasiswa dan dosen.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-book text-primary mb-4"></i>
                        <h5 class="mb-3">Akses Materi Perkuliahan</h5>
                        <p>Materi kuliah dapat diakses secara online kapan saja untuk mendukung proses belajar mandiri.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-users text-primary mb-4"></i>
                        <h5 class="mb-3">Forum Diskusi</h5>
                        <p>Fasilitas diskusi antara mahasiswa dan dosen untuk menunjang interaksi akademik.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item text-center pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-chart-bar text-primary mb-4"></i>
                        <h5 class="mb-3">Informasi Nilai & Absensi</h5>
                        <p>Memantau perkembangan nilai dan kehadiran secara real-time dan transparan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->

<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('frontend/img/about.jpg') }}" alt="Sistem Akademik" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">Tentang Kami</h6>
                <h1 class="mb-4">Selamat Datang di Sistem Akademik</h1>
                <p class="mb-4">Sistem Akademik ini dikembangkan untuk mendukung proses belajar mengajar di lingkungan kampus secara efektif dan efisien. Dengan fitur-fitur yang terintegrasi, mahasiswa dan dosen dapat berinteraksi serta mengakses informasi akademik kapan saja dan di mana saja.</p>
                <p class="mb-4">Platform ini menyediakan layanan manajemen jadwal kuliah, akses materi, forum diskusi, serta pemantauan nilai dan absensi secara online. Kami berkomitmen untuk memberikan kemudahan dan transparansi dalam setiap aktivitas akademik.</p>
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Manajemen Jadwal Kuliah</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Akses Materi Perkuliahan</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Forum Diskusi Mahasiswa & Dosen</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Informasi Nilai & Absensi</p>
                    </div>
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="/">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Tim Pengembang & Dosen</h6>
            <h1 class="mb-5">Profil Tim</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend/img/team-1.jpg') }}" alt="Dosen 1">
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Nama Dosen 1</h5>
                        <small>Dosen Pengajar</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend/img/team-2.jpg') }}" alt="Dosen 2">
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Nama Dosen 2</h5>
                        <small>Dosen Pengajar</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend/img/team-3.jpg') }}" alt="Tim IT 1">
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Nama Tim IT 1</h5>
                        <small>Pengembang Sistem</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="team-item bg-light">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="{{ asset('frontend/img/team-4.jpg') }}" alt="Tim IT 2">
                    </div>
                    <div class="text-center p-4">
                        <h5 class="mb-0">Nama Tim IT 2</h5>
                        <small>Pengembang Sistem</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
@endsection