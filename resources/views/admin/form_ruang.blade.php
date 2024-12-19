@extends('layouts.main_admin')

@section('title', 'Input Ruang')

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
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}">
                        <i class="bi bi-person"></i><span>Profil Saya</span></a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
                        <i class="bi bi-box-arrow-right"></i><span>Keluar</span></a>
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid"></i><span>Dashboard</span></a></li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-building"></i><span>Tambah Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('admin.create_building') }}"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                <li><a href="{{ route('admin.create_room') }}" class="active"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
            </ul>
        </li><!-- End Form Data Nav -->
        <li class="nav-item"><a class="nav-link collapsed" data-bs-target="#edits-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Edit Data</span><i class="bi bi-chevron-down ms-auto"></i></a>
            <ul id="edits-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="#"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                <li><a href="#"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
            </ul>
        </li><!-- End Edit Data Nav -->
        <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.riwayat') }}"><i class="bi bi-layout-text-window-reverse"></i><span>Riwayat</span></a></li>
    </ul>
</aside><!-- End Sidebar -->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item">Tambah Data</li>
                <li class="breadcrumb-item active">Data Ruang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Formulir Tambah Data Ruang</h5>

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success')}}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        <form method="POST" action="{{ route('admin.store_room') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="building" class="form-label">Gedung</label>
                                    <input type="text" name='building' class="form-control" id='building' required>
                                </div>
                                <div class="col-md-6">
                                    <label for="floor" class="form-label">Lantai</label>
                                    <input type="text" name='floor' class="form-control" id='floor' required>
                                </div>
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Ruangan</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="capacity" class="form-label">Kapasitas</label>
                                    <input type="number" name="capacity" class="form-control" id="capacity" required>
                                </div>
                                <div class="mb-3">
                                    <label for="facilities" class="form-label">Fasilitas</label>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="facilities[]" value="AC" id="ac">
                                            <label class="form-check-label" for="ac">AC</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="facilities[]" value="Proyektor" id="projector">
                                            <label class="form-check-label" for="projector">Proyektor</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="facilities[]" value="LCD" id="lcd">
                                            <label class="form-check-label" for="lcd">LCD</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="facilities[]" value="Papan Tulis" id="board">
                                            <label class="form-check-label" for="board">Papan Tulis</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="photo_url" class="form-label">Unggah Foto</label>
                                    <input type="file" name="photo_url" class="form-control" id="photo_url" accept="image/*" required>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<footer id="footer" class="footer">
    <div class="copyright">
        &copy; 2024 <strong><span>N-Space</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        Designed by <a href="#">Amanda</a>
    </div>
</footer><!-- End Footer -->

@endsection
