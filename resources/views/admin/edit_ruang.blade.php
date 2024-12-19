@extends('layouts.main_admin')

@section('title', 'Edit Ruang')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}"><i class="bi bi-person"></i> Profil Saya</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}"><i class="bi bi-box-arrow-right"></i> Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header><!-- End Header -->

    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-building"></i><span>Tambah Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="#"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                    <li><a href="{{ route('admin.display_room') }}"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
                </ul>
            </li><!-- End Form Data Nav -->

            <li class="nav-item">
                <a class="nav-link active" data-bs-target="#edits-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Edit Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="edits-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li><a href="#"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
                    <li><a href="#" class="active"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
                </ul>
            </li><!-- End Edit Data Nav -->
        </ul>
    </aside><!-- End Sidebar -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Beranda</a></li>
                    <li class="breadcrumb-item">Edit Data</li>
                    <li class="breadcrumb-item active">Data Ruang</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($rooms as $room)
                    <div class="col">
                        <div class="card text-center h-100">
                            <img src="{{ asset('storage/' . $room->photo_url) }}" class="card-img-top" alt="{{ $room->name }}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $room->name }}</h5>
                                <p class="card-text">Kapasitas: {{ $room->capacity }} orang</p>
                                <p class="card-text">Fasilitas: {{ implode(', ', json_decode($room->facilities)) }}</p>
                                <div class="d-grid gap-2 mt-3">
                                    
                                    <a href="#" class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main><!-- End #main -->

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endpush
