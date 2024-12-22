@extends('layouts.main_admin_admin')

@section('title', 'Form Edit Gedung')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style_Admin.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.index_admin') }}">
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
                <li class="breadcrumb-item"><a href="{{ route('admin.index_admin') }}">Beranda</a></li>
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
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endpush
