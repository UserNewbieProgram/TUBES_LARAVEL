@extends('layouts.main_mhs')

@section('title', 'Form Pengajuan')

@push('styles')
    <link href="{{ asset('assets/css/style_Mahasiswa.css') }}" rel="stylesheet">
@endpush

@section('content')
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index_Mahasiswa.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">N-Space</span>
      </a>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/foto-profil-mahasiswa.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">J. Smith</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Jack Smith</h6>
              <span>Mahasiswa</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profil_Mahasiswa.html">
                <i class="bi bi-person"></i>
                <span>Profil Saya</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="login_Mahasiswa.html">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<main id="main" class="main">
    <div class="container"></div>
    <div class="pagetitle">
      <h1>Form Peminjaman Ruangan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index_Mahasiswa.html">Gedung</a></li>
          <li class="breadcrumb-item">Ruangan</li>
          <li class="breadcrumb-item active">Form Peminjaman</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Isi Form dibawah Ini Untuk Mengajukan Peminjaman</h5>
            
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
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

            <!-- General Form Elements -->
            <form method="POST" action="{{ route('form.store') }}">
              @csrf
              <div class="row mb-3">
                  <label for="nama" class="col-sm-2 col-form-label">Nama Pemesan</label>
                  <div class="col-sm-10">
                      <input type="text" name="nama_pemesan" class="form-control" required>
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="nohp" class="col-sm-2 col-form-label">No. Hp</label>
                  <div class="col-sm-10">
                      <input type="text" name="no_hp" class="form-control" required>
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="namaruang" class="col-sm-2 col-form-label">Nama Ruangan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{ $room->name }}" readonly>
                    <input type="hidden" name="room_id" value="{{ $room->id }}">
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="tglmulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                  <div class="col-sm-2">
                      <input type="date" name="tgl_mulai" class="form-control" required>
                  </div>
                  <label for="tglselesai" class="col-sm-2 col-form-label text-end">Tanggal Selesai</label>
                  <div class="col-sm-2">
                      <input type="date" name="tgl_selesai" class="form-control" required>
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="jammulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                  <div class="col-sm-2">
                      <input type="time" name="jam_mulai" class="form-control" required>
                  </div>
                  <label for="jamselesai" class="col-sm-2 col-form-label text-end">Jam Selesai</label>
                  <div class="col-sm-2">
                      <input type="time" name="jam_selesai" class="form-control" required>
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
                  <div class="col-sm-10">
                      <textarea name="tujuan" class="form-control" style="height: 60px" required></textarea>
                  </div>
              </div>
              <div class="row mb-3">
                  <label for="organisasi" class="col-sm-2 col-form-label">Nama Organisasi</label>
                  <div class="col-sm-10">
                      <input type="text" name="organisasi" class="form-control" required>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary">Submit Form</button>
                      &nbsp;&nbsp;&nbsp;
                      <button type="reset" class="btn btn-secondary">Reset Form</button>
                  </div>
              </div>
            </form>
          <!-- End General Form Elements -->
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
</footer>
@endsection