@extends('layouts.appAuth') @section('content')
<div class="text-center">
    <a href="index.html">
        <img
            src="/img/LOGO SMK.png"
            alt=""
            height="250px"
            class="mx-auto"
        />
    </a>
    <p class="text-muted mt-2 mb-4">SMK CORODOVA</p>
</div>
<div class="card">
    <div class="card-body p-4">
        <div class="text-center mb-4">
            <h4 class="text-uppercase mt-0">Sign In</h4>
        </div>

        <form class="user" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Email address or Username</label>
                <div class="form-group">
                    <input
                        id="username"
                        type="text"
                        class="form-control @error('username') is-invalid @enderror"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        required
                        autocomplete="username"
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

<!-- end row -->

<!-- end col -->
@endsection
