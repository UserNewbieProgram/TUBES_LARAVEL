@extends('layouts.main_admin')

@section('title', 'Hapus Gedung')

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
                <a class="nav-link collapsed" data-bs-target="#edits-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Edit Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="edits-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        @if($allBuildings->isNotEmpty())
                            <a href="{{ route('admin.edit_gedung', ['id' => $allBuildings->first()->id]) }}">
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
                <a class="nav-link active" data-bs-target="#hapuss-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Hapus Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="hapuss-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        @if($allBuildings->isNotEmpty())
                            <a href="{{ route('admin.hapus_gedung', ['id' => $allBuildings->first()->id]) }}" class="active">
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
        <h1>Hapus Data Gedung</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index_mhs') }}">Beranda</a></li>
                <li class="breadcrumb-item">Hapus Data</li>
                <li class="breadcrumb-item active">Data Gedung</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="container">
            <!-- Flash message untuk sukses atau error -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Form Hapus Gedung -->
            <form id="delete-building-form" action="{{ route('admin.destroy_gedung', ['id' => $building->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')

                <div class="mb-3">
                    <label for="name_building" class="form-label">Nama Gedung</label>
                    <select class="form-control" id="name_building" name="name_building" required onchange="updateFormAction()">
                        @foreach($allBuildings as $bld)
                            <option value="{{ $bld->id }}" {{ $bld->id == $building->id ? 'selected' : '' }}>
                                {{ $bld->name_building }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </div>
    </section>
</main><!-- End #main -->

<script>
    // Update the form action dynamically when a new building is selected
    function updateFormAction() {
        const select = document.getElementById('name_building');
        const buildingId = select.value;  // Get the selected building ID
        const form = document.getElementById('delete-building-form');
        
        // Update the form's action URL with the selected building ID
        form.action = '/admin/' + buildingId + '/hapus_gedung';  // Update with your routing pattern
    }
</script>
@endsection
