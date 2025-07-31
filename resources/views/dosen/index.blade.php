@extends('layouts.main')

@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Daftar Dosen</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="/">Beranda</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Dosen</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Dosen Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Dosen</h6>
                <h1 class="mb-5">Daftar Dosen</h1>
            </div>
            <div class="row g-4">
                @forelse($dosens as $dosen)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" src="{{ $dosen->foto ? asset('storage/' . $dosen->foto) : asset('frontend/img/team-1.jpg') }}" alt="Foto Dosen">
                            </div>
                            <div class="text-center p-4">
                                <h5 class="mb-0">{{ $dosen->nama }}</h5>
                                <small>{{ $dosen->jabatan }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada data dosen.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Dosen End -->
    
@endsection