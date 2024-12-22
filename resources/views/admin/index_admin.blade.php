@extends('layouts.main_admin')

@section('title', 'Index Admin')

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
    </aside><!-- End Sidebar -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index_admin') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Request -->
                        <div class="col-12">
                            <div class="card request overflow-auto">
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Pengajuan Terbaru <span>| Today</span></h5>
                                    <table class="table table-hover">
                                        <thead class="text-center">
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
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>081234567890</td>
                                                <td>VIP A</td>
                                                <td>01-11-24</td>
                                                <td>02-11-24</td>
                                                <td>09.00</td>
                                                <td>11.00</td>
                                                <td>Seminar</td>
                                                <td>HMIT</td>
                                                <td>
                                                    <button type="button" class="btn btn-success rounded-pill">Approve</button>
                                                    <button type="button" class="btn btn-danger rounded-pill">Reject</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jack</td>
                                                <td>080987654321</td>
                                                <td>VIP C</td>
                                                <td>01-11-24</td>
                                                <td>01-11-24</td>
                                                <td>15.00</td>
                                                <td>18.00</td>
                                                <td>Ospek Jurusan</td>
                                                <td>HMIF</td>
                                                <td>
                                                    <button type="button" class="btn btn-success rounded-pill">Approve</button>
                                                    <button type="button" class="btn btn-danger rounded-pill">Reject</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Recent Sales -->
                    </div>
                </div><!-- End Left side columns -->
            </div>
        </section>
    </main><!-- End #main -->
@endsection