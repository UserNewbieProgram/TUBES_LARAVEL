@extends('layouts.main_mhs')

@section('title', 'Dashboard Mahasiswa')
@push('styles')
    <link href="{{ asset('assets/css/style_Mahasiswa.css') }}" rel="stylesheet">
@endpush
@section('content')
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('mahasiswa.index_mhs') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">N-Space</span>
        </a>
    </div>

    <nav class="header-nav ms-auto">
        <ul>
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
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-person"></i>
                            <span>Profil Saya</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
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
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('mahasiswa.index_mhs') }}">Beranda</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div id="map">
            <script>
                var map = L.map('map').setView([51.505, -0.09], 13);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                navigator.geolocation.watchPosition(success, error);
                let marker, circle, zoomed;

                function success(pos) {
                    const lat = pos.coords.latitude;
                    const lng = pos.coords.longitude;
                    const accuracy = pos.coords.accuracy;

                    if (marker) {
                        map.removeLayer(marker);
                        map.removeLayer(circle);
                    }
                    marker = L.marker([lat, lng]).addTo(map);
                    circle = L.circle([lat, lng], { radius: accuracy }).addTo(map);

                    if (!zoomed) {
                        zoomed = map.fitBounds(circle.getBounds());
                    }

                    map.setView([lat, lng]);
                }

                function error(err) {
                    if (err.code === 1) {
                        alert("Please allow geolocation access");
                    } else {
                        alert("Cannot get location");
                    }
                }
            </script>
        </div>
        <br />
        <div class="card-group">
            @foreach ($buildings as $building)
                <div class="card text-center">
                <img src="{{ asset('assets/img/' . $building['foto']) }}" 
                onerror="this.src='{{ asset('assets/img/default-image.jpg') }}'"
                class="card-img-top" alt="{{ $building['name_building'] }}" width="50%" height="75%">

                    <div class="card-body">
                        <h3 class="card-title">{{ $building['name_building'] }}</h3>
                        CONNECT MAPS <br /> <br />
                        <a href="{{ route('building.rooms', $building->id) }}" class="btn btn-danger">Cek Ketersediaan</a>
                    </div>
                </div>
            @endforeach
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
