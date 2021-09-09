@extends('layouts.app')

@section('title', 'Login')
@section('content')
<section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="../assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">Laundry Sejahtera</span></h4>
            <p class="text-muted">Sebelum anda mulai, anda harus masuk terlebih dahulu dengan akun anda.</p>

            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
              @csrf

              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus>

                @error('email')
                  <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </div>
                  @enderror
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required autocomplete="current-password">
                @error('password')
                  <div class="invalid-feedback"role="alert">
                    <strong>{{ $message }}</strong>
                  </div>
                @enderror
              </div>

              <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Ingat saya</label>
                </div>
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; ryzntx. | Design by Stisla 💙
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <div class="bullet"></div>
                <a href="#">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 id="greeting-text" class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
@push('addon-script')
<script>
    var today = new Date()
    var curHr = today.getHours()

    if (curHr > 0 && curHr < 11 ) {
        document.getElementById("greeting-text").innerText = "Selamat Pagi";
    } else if (curHr > 11 && curHr < 16) {
        document.getElementById("greeting-text").innerText = "Selamat Siang";
    } else if(curHr > 16 && curHr < 18){
        document.getElementById("greeting-text").innerText = "Selamat Sore";
    } else {
        document.getElementById("greeting-text").innerText = "Selamat Malam";
    }
</script>
@endpush

