@extends('layouts.appLogin')

@section('content')
<div class="container vh-100">

    <!-- Outer Row -->
    <div class="row h-100 justify-content-center align-items-center">
  
      <div class="col-xl-10 col-lg-12 col-md-9 login-form">
  
        <div class="card o-hidden border-0 shadow-lg my-2">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                  @csrf
                    <div class="form-group">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-group mb-3">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                            </div>
                          </div>                            
                    </div>
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                          {{ __('Login') }}
                      </button>
                  </form>
                  <hr>
                  <div class="text-right">
                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
