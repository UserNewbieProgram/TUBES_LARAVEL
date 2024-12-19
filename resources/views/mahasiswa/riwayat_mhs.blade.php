@extends('layouts.main_admin_mhs')

@section('title', 'Riwayat Mahasiswa')

@section('content')
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
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
                        <a class="dropdown-item d-flex align-items-center" href="">
                            <i class="bi bi-person"></i>
                            <span>Profil Saya</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Keluar</span>
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
        <h1>Riwayat Peminjaman Ruangan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Gedung</a></li>
                <li class="breadcrumb-item"><a href=""></a>Ruangan</li>
                <li class="breadcrumb-item active">Riwayat Peminjaman</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Peminjaman Ruangan Telkom University</h5>
                    <div class="datatable-top">
                        <div class="datatable-dropdown">
                            <label>
                                <select class="datatable-selsector" name="per-page">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="15">15</option>
                                    <option value="all">Semua</option>
                                </select>
                                Entri per halaman
                            </label>
                        </div>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col" class="text-center">No</th>
                                <th scope="col">Nama Pemesan</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Nama Ruangan</th>
                                <th scope="col">Tgl Mulai</th>
                                <th scope="col">Tgl Selesai</th>
                                <th scope="col">Jam Mulai</th>
                                <th scope="col">Jam Selesai</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Organisasi</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama_pemesan }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->nama_ruangan }}</td>
                                <td>{{ $item->tgl_mulai }}</td>
                                <td>{{ $item->tgl_selesai }}</td>
                                <td>{{ $item->jam_mulai }}</td>
                                <td>{{ $item->jam_selesai }}</td>
                                <td>{{ $item->tujuan }}</td>
                                <td>{{ $item->organisasi }}</td>
                                <td>
                                    <span class="badge bg-{{ $item->status == 'Disetujui' ? 'success' : 'danger' }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation" class="mt-4">
                        {{ $riwayat->links() }}
                    </nav>
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
        Original Template by <a href="https://bootstrapmade.com/">BootstrapMade</a>, modified by Kelompok 7
    </div>
</footer>
@endsection
