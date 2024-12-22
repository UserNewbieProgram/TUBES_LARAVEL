@extends('layouts.main_admin')

@section('title', 'Form Pengajuan')

@section('content')
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">N-Space</span>
        </a>
    </div>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
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
                            <i class="bi bi-person"></i> <span>Profil Saya</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-box-arrow-right"></i> <span>Keluar</span>
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
        <h1>Form Peminjaman Ruangan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Gedung</a></li>
                <li class="breadcrumb-item">Gedung GSG</li>
                <li class="breadcrumb-item">Daftar Ruangan</li>
                <li class="breadcrumb-item active">Form Pengajuan</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="calendar-container mb-4">
                <h2 class="calendar-title">Kalender Ketersediaan Ruangan</h2>
                <table class="calendar-table">
                    <thead>
                        <tr>
                            <th class="time-slot">Time</th>
                            <th class="time-slot">08:00</th>
                            <th class="time-slot">09:00</th>
                            <th class="time-slot">10:00</th>
                            <th class="time-slot">11:00</th>
                            <th class="time-slot">12:00</th>
                            <th class="time-slot">13:00</th>
                            <th class="time-slot">14:00</th>
                            <th class="time-slot">15:00</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room['name'] }}</td>
                            @foreach ($room['slots'] as $slot)
                                <td class="{{ $slot['status'] }}" colspan="{{ $slot['span'] }}">{{ $slot['label'] }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Isi Form di bawah Ini untuk Mengajukan Peminjaman</h5>
                    <form action="{{ route('mahasiswa.peminjaman.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama Pemesan</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNoHp" class="col-sm-2 col-form-label">No. HP</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_hp" class="form-control" required>
                            </div>
                        </div>
                        <!-- Tambahkan Input Lainnya -->
                        <div class="row mb-3">
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                                <button type="reset" class="btn btn-secondary">Reset Form</button>
                            </div>
                        </div>
                    </form>
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
        Original Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer>
@endsection
