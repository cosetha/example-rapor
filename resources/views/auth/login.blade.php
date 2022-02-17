@extends('layouts.appAuth') @section('content')
<div class="text-center">
    <a href="index.html">
        <img
            src="assets/images/logo-dark.png"
            alt=""
            height="22"
            class="mx-auto"
        />
    </a>
    <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>
</div>
<div class="card">
    <div class="card-body p-4">
        <div class="text-center mb-4">
            <h4 class="text-uppercase mt-0">Sign In</h4>
        </div>

        <form class="user" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <div class="form-group">
                    <input
                        id="email"
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                    />
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                    id="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    required
                    autocomplete="current-password"
                />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input"
                    name="remember" id="remember" {{ old('remember') ? 'checked'
                    : '' }}>
                    <label class="form-check-label" for="remember"
                        >Remember me</label
                    >
                </div>
            </div>

            <div class="mb-3 d-grid text-center">
                <button class="btn btn-primary" type="submit">Log In</button>
            </div>
        </form>
    </div>
    <!-- end card-body -->
</div>
<!-- end card -->

<div class="row mt-3">
    <div class="col-12 text-center">
        <p>
            <a href="pages-recoverpw.html" class="text-muted ms-1"
                ><i class="fa fa-lock me-1"></i>Forgot your password?</a
            >
        </p>
        <p class="text-muted">
            Don't have an account?
            <a href="pages-register.html" class="text-dark ms-1"
                ><b>Sign Up</b></a
            >
        </p>
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<!-- end col -->
@endsection
