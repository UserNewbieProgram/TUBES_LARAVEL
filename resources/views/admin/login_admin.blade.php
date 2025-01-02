@extends('layouts.main_admin')
@section('title', 'Login Admin')

@section('content')
<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="{{ route('admin.login') }}" class="logo d-flex align-items-center w-auto">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">N-Space</span>
              </a>
            </div>

            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2 text-center">
                  <h5 class="card-title pb-0 fs-4">Selamat Datang Admin</h5>
                  <p class="small">Masukkan username & password untuk login</p>
                </div>

                <!-- Form Action -->
                <form method="POST" action="{{ route('admin.login.submit') }}" class="row g-3 needs-validation" novalidate>
                  @csrf

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please enter your username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100 text-center">Login</button>
                  </div>

                  <div class="col-12 text-center mt-3">
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="switch-container">
                      <span class="switch-label">Login as: Admin</span>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="roleSwitch" checked onchange="switchRole()">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<script>
  function switchRole() {
    window.location.href = '{{ route("mahasiswa.login") }}';
  }
</script>
@endsection
