@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center mb-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width: 150px;">
            </div>
            <div class="card">
                <div class="card-header text-center">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- CAPTCHA -->
                        <div class="mb-3">
                            <label for="captcha" class="form-label">Captcha</label>
                            <div class="d-flex">
                                <span id="captcha-img">{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-warning ms-2" id="refresh-captcha">🔄</button>
                            </div>
                            <input type="text" id="captcha" name="captcha" class="form-control mt-2 @error('captcha') is-invalid @enderror" required>
                            @error('captcha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <div class="mt-3 text-center">
                            <a href="{{ route('register') }}">{{ __('Belum punya akun? Daftar di sini!') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk Refresh CAPTCHA -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#refresh-captcha').click(function () {
        $.ajax({
            type: 'GET',
            url: '{{ route("captcha.refresh") }}',
            success: function (data) {
                $('#captcha-img').html(data.captcha);
            }
        });
    });
</script>
@endsection
