@extends('layouts.main_admin')

@section('title', 'Edit Gedung')

@push('styles')
<!-- Tambahkan CSS khusus jika diperlukan -->
@endpush

@section('content')
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
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
                </a><!-- End Profile Image Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>Kevin Anderson</h6>
                        <span>Admin</span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}"><i class="bi bi-person"></i> <span>Profil Saya</span></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}"><i class="bi bi-box-arrow-right"></i> <span>Keluar</span></a></li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid"></i><span>Dashboard</span></a></li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-building"></i><span>Tambah Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('admin.add-gedung') }}"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                <li><a href="{{ route('admin.add-ruang') }}"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
            </ul>
        </li><!-- End Form Data Nav -->

        <li class="nav-item">
            <a class="nav-link active" data-bs-target="#edits-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Edit Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="edits-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('admin.edit_building') }}" class="active"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                <li><a href="{{ route('admin.display_room') }}"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
            </ul>
        </li><!-- End Edit Data Nav -->

        <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.history') }}"><i class="bi bi-layout-text-window-reverse"></i><span>Riwayat</span></a></li>
    </ul>
</aside><!-- End Sidebar -->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Data Gedung</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item">Edit Data</li>
                <li class="breadcrumb-item active">Data Gedung</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col h-100">
                    <div class="card text-center h-100">
                        <img src="{{ asset('assets/img/GSG.jpg') }}" class="card-img-top" alt="Gedung Serba Guna">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">GSG</h5>
                            <p><a href="#" class="text-decoration-none">CONNECT MAPS</a></p>
                            <div class="d-grid gap-2 mt-3">
                                <a href="{{ route('admin.edit_building-form', ['gedung' => 'gsg']) }}" class="btn btn-primary" role="button">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Duplicate this for other buildings -->
            </div>
        </div>
    </section>
</main><!-- End #main -->

<footer id="footer" class="footer">
    <div class="copyright">&copy; 2024 <strong><span>N-Space</span></strong>. All Rights Reserved</div>
    <div class="credits">Original Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>, modified by Kelompok 7</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@push('scripts')
<!-- Tambahkan script khusus jika diperlukan -->
@endpush
@endsection
