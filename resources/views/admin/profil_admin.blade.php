@extends('layouts.main_admin')

@section('title', 'Profil Admin')

@push('styles')
    <!-- Tambahkan CSS khusus jika diperlukan -->
@endpush

@section('content')
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.index_admin') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">N-Space</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/foto-profil-admin.jpg') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Admin</span>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profil') }}"><i class="bi bi-person"></i> <span>Profil Saya</span></a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}"><i class="bi bi-box-arrow-right"></i> <span>Keluar</span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.index_admin') }}"><i class="bi bi-grid"></i> <span>Dashboard</span></a></li>
            <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.data.gedung') }}"><i class="bi bi-building"></i><span>Tambah Data</span></a></li>
            <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.data.riwayat') }}"><i class="bi bi-layout-text-window-reverse"></i><span>Riwayat</span></a></li>
        </ul>
    </aside><!-- End Sidebar -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profil Saya</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index_admin') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Profil Saya</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset('assets/img/foto-profil-admin.jpg') }}" alt="Profile" class="rounded-circle">
                            <h2>Kevin Anderson</h2>
                            <h3>Admin</h3>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <h5 class="card-title">Detail Profil</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Perusahaan</div>
                                <div class="col-lg-9 col-md-8">Universitas Telkom</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">ID</div>
                                <div class="col-lg-9 col-md-8">102030</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Negara</div>
                                <div class="col-lg-9 col-md-8">Indonesia</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Alamat</div>
                                <div class="col-lg-9 col-md-8">Jl. Dayu Utama No. 25A, Sleman, Yogyakarta</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">No. HP</div>
                                <div class="col-lg-9 col-md-8">081122334455</div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; 2024 <strong><span>N-Space</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Original Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>, modified by Kelompok 7
        </div>
    </footer><!-- End Footer -->
@endsection

@push('scripts')
    <!-- Tambahkan JS khusus jika diperlukan -->
@endpush
