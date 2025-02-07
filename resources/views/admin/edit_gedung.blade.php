@extends('layouts.main_admin')

@section('title', 'Edit Gedung')

@push('styles')
    <link href="{{ asset('assets/css/style_Admin.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.index_admin') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-building"></i><span>Tambah Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.form_gedung') }}">
                            <i class="bi bi-circle"></i><span>Data Gedung</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.create_room') }}">
                            <i class="bi bi-circle"></i><span>Data Ruang</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Form Data Nav -->

            <li class="nav-item">
                <a class="nav-link active" data-bs-target="#edits-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Edit Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="edits-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        @if($allBuildings->isNotEmpty())
                            <a href="{{ route('admin.edit_gedung', ['id' => $allBuildings->first()->id]) }}" class="active">
                                <i class="bi bi-circle"></i><span>Data Gedung</span>
                            </a>
                        @else
                            <a href="#" class="text-muted">
                                <i class="bi bi-circle"></i><span>Data Gedung (Kosong)</span>
                            </a>
                        @endif
                    </li>

                    <li>
                        <a href="{{ route('admin.display_room') }}">
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
                        @if($allBuildings->isNotEmpty())
                            <a href="{{ route('admin.hapus_gedung', ['id' => $allBuildings->first()->id]) }}">
                                <i class="bi bi-circle"></i><span>Data Gedung</span>
                            </a>
                        @else
                            <a href="#" class="text-muted">
                                <i class="bi bi-circle"></i><span>Data Gedung (Kosong)</span>
                            </a>
                        @endif
                    </li>
                </ul>
            </li><!-- End Delete Data Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.bookings.history') }}">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Riwayat</span>
                </a>
            </li><!-- End Riwayat Nav -->
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

        <!-- Alert jika ada flash message -->
        @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        @endif
        
        <!-- ErrorHandling -->
        @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        <form action="{{ route('admin.update_gedung', $building->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="building_id" class="form-label">Pilih Gedung</label>
        <select class="form-control" id="building_id" name="building_id" required>
            @foreach($allBuildings as $bld)
                <option value="{{ $bld->id }}" {{ $bld->id == $building->id ? 'selected' : '' }} data-name="{{ $bld->name_building }}">
                    {{ $bld->name_building }}
                </option>
            @endforeach
        </select>
        <!-- Hidden field untuk menyimpan name_building -->
        <input type="hidden" name="name_building" id="name_building" value="{{ $building->name_building }}">
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

<script>
    // Menangani perubahan dropdown building_id dan update name_building
    document.getElementById('building_id').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const buildingName = selectedOption.getAttribute('data-name');
        document.getElementById('name_building').value = buildingName;  // Set hidden field
    });
</script>

@endsection
