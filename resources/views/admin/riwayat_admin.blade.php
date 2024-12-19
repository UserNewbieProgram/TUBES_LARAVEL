@extends('layouts.main_admin')

@section('title', 'Riwayat Admin')

@push('styles')
<link href="{{ asset('assets/css/style_Admin.css') }}" rel="stylesheet">
@endpush

@section('content')
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
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>Kevin Anderson</h6>
                        <span>Admin</span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}">
                        <i class="bi bi-person"></i>
                        <span>Profil Saya</span></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Keluar</span></a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.riwayat') }}">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Riwayat</span>
            </a>
        </li>
    </ul>
</aside>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Riwayat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item active">Riwayat</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DATA RIWAYAT PENGAJUAN RUANGAN</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="text-center align-middle">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">No. HP</th>
                                        <th scope="col">Ruangan</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Selesai</th>
                                        <th scope="col">Jam Mulai</th>
                                        <th scope="col">Jam Selesai</th>
                                        <th scope="col">Tujuan</th>
                                        <th scope="col">Organisasi</th>
                                        <th scope="col">Tanggal Pengajuan</th>
                                        <th scope="col">Tanggal Diproses</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <tr>
                                        <th scope="row" class="text-center">1</th>
                                        <td>Mark</td>
                                        <td>081234567890</td>
                                        <td class="text-center">VIP A</td>
                                        <td class="text-center">01-11-24</td>
                                        <td class="text-center">02-11-24</td>
                                        <td class="text-center">09.00</td>
                                        <td class="text-center">11.00</td>
                                        <td>Seminar</td>
                                        <td class="text-center">HMIT</td>
                                        <td class="text-center">30-10-24</td>
                                        <td class="text-center">31-10-24</td>
                                        <td class="text-center"><span class="badge bg-success">Disetujui</span></td>
                                    </tr>
                                    <!-- Add other rows as necessary -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer id="footer" class="footer">
    <div class="copyright">
        &copy; 2024 <strong><span>N-Space</span></strong>. All Rights Reserved
    </div>
</footer>

@push('scripts')
<script src="{{ asset('assets/js/main.js') }}"></script>
@endpush
@endsection
