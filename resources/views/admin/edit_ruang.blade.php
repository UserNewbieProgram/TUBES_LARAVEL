@extends('layouts.main_admin')

@section('title', 'Edit Ruang')

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
                        @if($buildings->isNotEmpty())
                            <a href="{{ route('admin.edit_gedung', ['id' => $buildings->first()->id]) }}">
                                <i class="bi bi-circle"></i><span>Data Gedung</span>
                            </a>
                        @else
                            <a href="#" class="text-muted">
                                <i class="bi bi-circle"></i><span>Data Gedung (Kosong)</span>
                            </a>
                        @endif
                    </li>

                    <li>
                        <a href="{{ route('admin.display_room') }}" class="active">
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
                        @if($buildings->isNotEmpty())
                            <a href="{{ route('admin.hapus_gedung', ['id' => $buildings->first()->id]) }}">
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
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Riwayat</span>
                </a>
            </li><!-- End Riwayat Nav -->
        </ul>
    </aside><!-- End Sidebar -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index_admin') }}">Beranda</a></li>
                    <li class="breadcrumb-item">Edit Data</li>
                    <li class="breadcrumb-item active">Data Ruang</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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
                                <div class="d-flex gap-2 mt-3 justify-content-center">
                                    <a href="{{ route('admin.edit_room', $room->id) }}" class="btn btn-primary w-50">Edit</a>
                                    <form action="{{ route('admin.delete_room', $room->id) }}" method="POST" class="w-50">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endpush
