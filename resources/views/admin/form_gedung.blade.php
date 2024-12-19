@extends('layouts.main_admin')

@section('title', 'Input Gedung')

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
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}">
                            <i class="bi bi-person"></i>
                            <span>Profil Saya</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-building"></i><span>Tambah Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.create_building') }}" class="active">
                        <i class="bi bi-circle"></i><span>Data Gedung</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.create_room') }}">
                        <i class="bi bi-circle"></i><span>Data Ruang</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Form Data Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#edits-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Edit Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="edits-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.edit_building') }}">
                        <i class="bi bi-circle"></i><span>Data Gedung</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.display_room') }}">
                        <i class="bi bi-circle"></i><span>Data Ruang</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Edit Data Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.riwayat') }}">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Riwayat</span>
            </a>
        </li><!-- End Riwayat Nav -->
    </ul>
</aside><!-- End Sidebar-->
<!-- End Sidebar -->

<main id="main" class="main">
    <!-- Konten utama form dan lainnya di sini, sesuai dengan yang sudah dijelaskan sebelumnya -->
</main><!-- End #main -->

<footer id="footer" class="footer">
    <div class="copyright">
        &copy; 2024 <strong><span>N-Space</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Original Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>, modified by Kelompok 7
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
