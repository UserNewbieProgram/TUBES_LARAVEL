@extends('layouts.main_mhs')

@section('title', 'Daftar Ruang ' . $building->name_building)

@section('content')
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="img-fluid">
            <span class="d-none d-lg-block">N-Space</span>
        </a>
    </div>

    <nav class="header-nav ms-auto">
        <ul>
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/img/foto-profil-mahasiswa.jpg') }}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">J. Smith</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>Jack Smith</h6>
                        <span>Mahasiswa</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-person"></i>
                            <span>Profil Saya</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<main id="main" class="main">
    <div class="container"></div>
    <div class="pagetitle">
        <h1>Daftar Ruangan {{ $building->name_building }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index_mhs') }}">Beranda</a></li>
                <li class="breadcrumb-item">{{ $building->name_building }}</li>
                <li class="breadcrumb-item active">Daftar Ruangan</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="card-group">
            @foreach ($rooms as $room)
                <div class="card text-center mb-4 me-4">
                    <img src="{{ asset('storage/' . $room->photo_url) }}" 
                         class="card-img-top" 
                         alt="{{ $room->name }}" 
                         width="50%" 
                         height="75%">
                    <div class="card-body">
                        <h3 class="card-title">{{ $room->name }}</h3>
                        <p>Kapasitas : {{ $room->capacity }} orang</p>
                        <p>Fasilitas : {{ implode(', ', json_decode($room->facilities)) }}</p>
                        <a href="{{ route('form.create', ['room_id' => $room->id]) }}" 
                           class="btn btn-danger">Cek Ketersediaan</a>
                    </div>
                </div>
            @endforeach
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
