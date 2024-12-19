@extends('layouts.main_admin')

@section('title', 'Form Edit Ruang')

@push('styles')
<!-- Jika ada file CSS khusus untuk halaman ini, Anda bisa menambahkannya di sini -->
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
          <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}"><i class="bi bi-person"></i><span>Profil Saya</span></a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}"><i class="bi bi-box-arrow-right"></i><span>Keluar</span></a></li>
        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->
    </ul>
  </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.dashboard') }}"><i class="bi bi-grid"></i><span>Dashboard</span></a></li>
    <li class="nav-item"><a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#"><i class="bi bi-building"></i><span>Tambah Data</span><i class="bi bi-chevron-down ms-auto"></i></a>
      <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li><a href="{{ route('admin.forms.gedung') }}"><i class="bi bi-circle"></i><span>Data Gedung</span></a></li>
        <li><a href="{{ route('admin.forms.ruang') }}" class="active"><i class="bi bi-circle"></i><span>Data Ruang</span></a></li>
      </ul>
    </li><!-- End Form Data Nav -->

    <li class="nav-item"><a class="nav-link collapsed" href="{{ route('admin.history') }}"><i class="bi bi-layout-text-window-reverse"></i><span>Riwayat</span></a></li><!-- End Riwayat Nav -->
  </ul>
</aside><!-- End Sidebar-->

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Data</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Beranda</a></li>
        <li class="breadcrumb-item">Edit Data</li>
        <li class="breadcrumb-item"><a href="{{ route('admin.edits.ruang') }}">Data Ruang</a></li>
        <li class="breadcrumb-item active">Form Edit Ruang</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Formulir Edit Data Ruang</h5>

            <!-- Formulir Input Data Ruang -->
            <form action="{{ route('admin.ruang.update') }}" method="POST">
              @csrf
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="inputText" class="form-label">Gedung</label>
                  <input type="text" class="form-control" name="gedung">
                </div>
                <div class="col-md-6">
                  <label for="inputNumber" class="form-label">Lantai</label>
                  <input type="number" class="form-control" name="lantai">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Ruangan</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama_ruangan">
                </div>
              </div>
              <div class="input-group mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Kapasitas</label>
                <div>
                  <input type="number" class="form-control" name="kapasitas">
                </div>
                <span class="input-group-text">orang</span>
              </div>
              <div class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Fasilitas</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="ac">
                    <label class="form-check-label" for="gridCheck1">AC</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck2" name="proyektor">
                    <label class="form-check-label" for="gridCheck2">Proyektor</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck3" name="lcd">
                    <label class="form-check-label" for="gridCheck3">LCD</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck4" name="papan_tulis">
                    <label class="form-check-label" for="gridCheck4">Papan Tulis</label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputFile" class="col-sm-2 col-form-label">Foto Upload</label>
                <div class="col-sm-10">
                  <input class="form-control" type="file" id="formFile" name="foto">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit Form</button>
                  <button type="reset" class="btn btn-secondary ms-2">Reset Form</button>
                </div>
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
    Original Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>, modified by Kelompok 7
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="{{ asset('assets/js/main.js') }}"></script>
@endsectio
