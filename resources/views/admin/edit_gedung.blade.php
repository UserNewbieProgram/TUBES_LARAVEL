@extends('layouts.main_admin')

@section('title', 'Edit Gedung')

@push('styles')
    <link href="{{ asset('assets/css/style_Admin.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('mahasiswa.index_mhs') }}" class="logo d-flex align-items-center">
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
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-person"></i> <span>Profil Saya</span></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="bi bi-box-arrow-right"></i> <span>Keluar</span></a></li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.index_admin')}}"><i class="bi bi-grid"></i><span>Dashboard</span></a></li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-building"></i><span>Tambah Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('admin.form_gedung') }}"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                <li><a href="#"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
            </ul>
        </li><!-- End Form Data Nav -->

        <li class="nav-item">
            <a class="nav-link active" data-bs-target="#edits-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Edit Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="edits-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li><a href="{{ route('admin.edit_gedung', ['id' => $building->id]) }}" class="active"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                <li><a href="#"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
            </ul>
        </li><!-- End Edit Data Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#hapuss-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Hapus Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="hapuss-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    
                        <a href="{{ route('admin.hapus_gedung', ['id' => $building->id]) }}">
                            <i class="bi bi-circle"></i><span>Data Gedung</span>
                        </a>
                    
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Data Ruang</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Delete Data Nav -->

        <li class="nav-item"><a class="nav-link collapsed" href="#"><i class="bi bi-layout-text-window-reverse"></i><span>Riwayat</span></a></li>
    </ul>
</aside><!-- End Sidebar -->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Data Gedung</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index_mhs') }}">Beranda</a></li>
                <li class="breadcrumb-item">Edit Data</li>
                <li class="breadcrumb-item active">Data Gedung</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
        <form action="{{ route('admin.update_gedung', $building->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name_building" class="form-label">Nama Gedung</label>
            <select class="form-control" id="name_building" name="name_building" required>
                        @foreach($allBuildings as $bld)
                            <option value="{{ $bld->name_building }}" {{ $bld->name_building == $building->name_building ? 'selected' : '' }}>
                                {{ $bld->name_building }}
                            </option>
                        @endforeach
                    </select>
        </div>

        <div class="mb-3">
            <label for="floor" class="form-label">Lantai</label>
            <input type="number" class="form-control" id="floor" name="floor" value="{{ $building->floor }}" required>
        </div>

        <div class="mb-3">
            <label for="mapping" class="form-label">Mapping URL</label>
            <input type="url" class="form-control" id="mapping" name="mapping" value="{{ $building->mapping }}" required>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <small>Upload file gambar (opsional).</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
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
