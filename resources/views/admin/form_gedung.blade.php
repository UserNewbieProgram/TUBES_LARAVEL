@extends('layouts.main_admin')

@section('title', 'Input Gedung')
@push('styles')
    <link href="{{ asset('assets/css/style_Admin.css') }}" rel="stylesheet">
@endpush
@section('content')
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.index_admin')}}">
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
                    <a href="{{ route('admin.form_gedung') }}" class="active">
                        <i class="bi bi-circle"></i><span>Data Gedung</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
                    @if(isset($building))
                        <a href="{{ route('admin.edit_gedung', ['id' => $building->id]) }}">
                            <i class="bi bi-circle"></i><span>Data Gedung</span>
                        </a>
                    @endif
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Data Ruang</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Edit Data Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#hapuss-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Hapus Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="hapuss-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    
                        <a href="#">
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

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-layout-text-window-reverse"></i>
                <span>Riwayat</span>
            </a>
        </li><!-- End Riwayat Nav -->
    </ul>
</aside><!-- End Sidebar-->
<!-- End Sidebar -->

<main id="main" class="main">
    <!-- Konten utama form dan lainnya di sini, sesuai dengan yang sudah dijelaskan sebelumnya -->
    <div class="pagetitle">
      <h1>Tambah Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Beranda</a></li>
          <li class="breadcrumb-item">Tambah Data</li>
          <li class="breadcrumb-item active">Data Gedung</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Formulir Tambah Data Gedung</h5>

              <!-- Formulir Input Data Gedung -->
              <form action="{{ route('admin.store_gedung') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Nama Gedung</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name_building" id="inputText" value = "{{ $building->name_bulding ?? ''}}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Jumlah Lantai</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="floor" id="inputNumber" value = "{{ $building->floor ?? ''}}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputURL" class="col-sm-2 col-form-label">Alamat (Link Maps)</label>
        <div class="col-sm-10">
            <input type="url" class="form-control" name="mapping" id="inputURL" placeholder="https://contoh.com" value = "{{ $building->mapping ?? ''}}">
        </div>
    </div>
    <div class="row mb-3">
        <label for="formFile" class="col-sm-2 col-form-label">Foto Upload</label>
        <div class="col-sm-10">
            <input class="form-control" type="file" name="foto" id="formFile">
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
</main><!-- End #main -->
@endsection
