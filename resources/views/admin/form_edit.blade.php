@extends('layouts.main_admin')

@section('title', 'Form Edit Ruang')

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
                <a class="nav-link collapsed" href="{{ route('admin.bookings.history') }}">
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
        <li class="breadcrumb-item"><a href="{{ route('admin.display_room') }}">Data Ruang</a></li>
        <li class="breadcrumb-item active">Form Edit Ruang</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Formulir Edit Data Ruang</h5>

              @if(session('success'))
                <div class="alert alert-success">{{ session('success')}}</div>
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

              <form action="{{ route('admin.update_room', $room->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row mb-3">
                  <div class="col-md-6">
                      <label for="building_id" class="form-label">Gedung</label>
                      <select name="building_id" class="form-control" required>
                          @foreach($buildings as $building)
                              <option value="{{ $building->id }}" {{ $room->building_id == $building->id ? 'selected' : '' }}>
                                  {{ $building->name_building }}
                              </option>
                          @endforeach
                      </select>
                  </div>
                  <div class="col-md-6">
                      <label for="floor" class="form-label">Lantai</label>
                      <input type="number" class="form-control" name="floor" value="{{ $room->floor }}" required>
                  </div>
              </div>

              <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Nama Ruangan</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="{{ $room->name }}" required>
                  </div>
              </div>

              <div class="row mb-3">
                  <label for="capacity" class="col-sm-2 col-form-label">Kapasitas</label>
                  <div class="col-sm-10">
                      <div class="input-group">
                          <input type="number" class="form-control" name="capacity" value="{{ $room->capacity }}" required>
                          <span class="input-group-text">orang</span>
                      </div>
                  </div>
              </div>

              <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Fasilitas</label>
                  <div class="col-sm-10">
                      @php $facilities = json_decode($room->facilities) @endphp
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="facilities[]" value="AC" 
                              {{ in_array('AC', $facilities) ? 'checked' : '' }}>
                          <label class="form-check-label">AC</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="facilities[]" value="Proyektor"
                              {{ in_array('Proyektor', $facilities) ? 'checked' : '' }}>
                          <label class="form-check-label">Proyektor</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="facilities[]" value="LCD"
                              {{ in_array('LCD', $facilities) ? 'checked' : '' }}>
                          <label class="form-check-label">LCD</label>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="facilities[]" value="Papan Tulis"
                              {{ in_array('Papan Tulis', $facilities) ? 'checked' : '' }}>
                          <label class="form-check-label">Papan Tulis</label>
                      </div>
                  </div>
              </div>

              <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Foto Saat Ini</label>
                  <div class="col-sm-10">
                      <img src="{{ asset('storage/' . $room->photo_url) }}" alt="Current Photo" style="max-width: 200px">
                  </div>
              </div>

              <div class="row mb-3">
                  <label for="photo_url" class="col-sm-2 col-form-label">Upload Foto Baru</label>
                  <div class="col-sm-10">
                      <input class="form-control" type="file" name="photo_url">
                      <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto</small>
                  </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit Form</button>
                  <button type="reset" class="btn btn-secondary ms-2">Reset Form</button>
                </div>
              </div>
            </form><!-- End General Form Elements -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
