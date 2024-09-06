@extends('backend.layout.auth')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{ route('home') }}" class="app-brand-link gap-2">
              <img src="{{ asset('front-end/images/logo-idnet.webp') }}" alt="logo" height="50">
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Login</h4>
          {{-- <p class="mb-4"></p> --}}

          @if ($errors->any())
          @foreach ($errors->all() as $error)
          <p class="text-danger">{{ $error }}</p>
          @endforeach
          @endif
          <form id="formAuthentication" class="mb-3" action="{{ route('auth.signin') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="email" 
                placeholder="Enter your username" autofocus />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                {{-- <a href="auth-forgot-password-basic.html">
                  <small>Forgot Password?</small>
                </a> --}}
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" name="rememberme" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>


        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection