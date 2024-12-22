@extends('layouts.main_admin')

@section('title', 'Profil Mahasiswa')

@section('content')
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('mahasiswa.index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">N-Space</span>
        </a>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/img/foto-profil-mahasiswa.jpg') }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ $mahasiswa->nama }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ $mahasiswa->nama }}</h6>
                        <span>Mahasiswa</span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-person"></i>
                        <span>Profil Saya</span></a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Keluar</span></a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<main id="main" class="main">
    <div class="container">
        <div class="pagetitle">
            <h1>Profil Saya</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Profil Saya</li>
                </ol>
            </nav>
        </div>

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/foto-profil-mahasiswa.jpg') }}" alt="Profile" class="rounded-circle">
                            <h2>{{ $mahasiswa->nama }}</h2>
                            <h3>Mahasiswa</h3>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <div class="tab-pane fade show active profile-overview">
                                <h5 class="card-title">Detail Profil</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                    <div class="col-lg-9 col-md-8">{{ $mahasiswa->nama }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Angkatan</div>
                                    <div class="col-lg-9 col-md-8">{{ $mahasiswa->angkatan }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">NIM</div>
                                    <div class="col-lg-9 col-md-8">{{ $mahasiswa->nim }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Negara</div>
                                    <div class="col-lg-9 col-md-8">{{ $mahasiswa->negara }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">{{ $mahasiswa->alamat }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">No. HP</div>
                                    <div class="col-lg-9 col-md-8">{{ $mahasiswa->no_hp }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $mahasiswa->email }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<footer id="footer" class="footer">
    <div class="copyright">
        &copy; 2024 <strong><span>N-Space</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Original Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>, modified by Kelompok 7
    </div>
</footer>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
