@extends('layouts.main_admin')

@section('title', 'Riwayat Admin')

@push('styles')
<link href="{{ asset('assets/css/style_Admin.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.index_admin') }}">
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
                <ul id="edits-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
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
        <h1>Riwayat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index_admin') }}">Beranda</a></li>
                <li class="breadcrumb-item active">Riwayat</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DATA RIWAYAT PENGAJUAN RUANGAN</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead class="text-center align-middle">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Pemesan</th>
                                        <th scope="col">No. HP</th>
                                        <th scope="col">Ruangan</th>
                                        <th scope="col">Tanggal Mulai</th>
                                        <th scope="col">Tanggal Selesai</th>
                                        <th scope="col">Jam Mulai</th>
                                        <th scope="col">Jam Selesai</th>
                                        <th scope="col">Tujuan</th>
                                        <th scope="col">Organisasi</th>
                                        <th scope="col">Tanggal Pengajuan</th>
                                        <th scope="col">Tanggal Diproses</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <tr>
                                        <th scope="row" class="text-center">1</th>
                                        <td>Mark</td>
                                        <td>081234567890</td>
                                        <td class="text-center">VIP A</td>
                                        <td class="text-center">01-11-24</td>
                                        <td class="text-center">02-11-24</td>
                                        <td class="text-center">09.00</td>
                                        <td class="text-center">11.00</td>
                                        <td>Seminar</td>
                                        <td class="text-center">HMIT</td>
                                        <td class="text-center">30-10-24</td>
                                        <td class="text-center">31-10-24</td>
                                        <td class="text-center"><span class="badge bg-success">Disetujui</span></td>
                                    </tr>
                                    <!-- Add other rows as necessary -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer id="footer" class="footer">
    <div class="copyright">
        &copy; 2024 <strong><span>N-Space</span></strong>. All Rights Reserved
    </div>
</footer>

@push('scripts')
<script src="{{ asset('assets/js/main.js') }}"></script>
@endpush
@endsection
