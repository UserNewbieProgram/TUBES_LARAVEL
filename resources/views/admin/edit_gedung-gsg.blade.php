@extends('layouts.main_admin_admin')

@section('title', 'Form Edit Gedung')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
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
    </div>
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
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}">
                            <i class="bi bi-person"></i><span>Profil Saya</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
                            <i class="bi bi-box-arrow-right"></i><span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i><span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-bs-target="#edits-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Edit Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="edits-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('admin.editGedung') }}" class="active"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                <li><a href="{{ route('admin.editRuang') }}"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
            </ul>
        </li>
    </ul>
</aside>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item">Edit Data</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.editGedung') }}">Data Gedung</a></li>
                <li class="breadcrumb-item active">Form Edit Gedung</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulir Edit Data Gedung</h5>
                        <form method="POST" action="{{ route('admin.updateGedung') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="nama_gedung" class="col-sm-2 col-form-label">Nama Gedung</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_gedung" id="nama_gedung">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jumlah_lantai" class="col-sm-2 col-form-label">Jumlah Lantai</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="jumlah_lantai" id="jumlah_lantai">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat (Link Maps)</label>
                                <div class="col-sm-10">
                                    <input type="url" class="form-control" name="alamat" id="alamat" placeholder="https://contoh.com">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="foto" class="col-sm-2 col-form-label">Foto Upload</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="foto" id="foto">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                    <button type="reset" class="btn btn-secondary ms-2">Reset Form</button>
                                </div>
                            </div>
                        </form>
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
    <div class="credits">
        Original Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>, modified by Kelompok 7
    </div>
</footer>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endpush
