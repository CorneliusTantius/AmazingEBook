@extends('layouts.main')

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/loginStyle.css') }}" rel="stylesheet">
@endpush

@section('content')
    @if (Session::get('auth_session'))
        {{ info(Session::get('auth_session')['email']) }}
    @endif

    <div class="container col-3">
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissable fade show mt-3 d-flex justify-content-between" role="aler">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <main class="form-signin center-form  text-center my-5">
            <h1 class="h3 my-3 fw-normal">{{ __('app.login') }}</h1>
            <form action="/api/login" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        placeholder="name@example.com" autofocus required
                        value="{{ Cookie::get('EMAIL_COOKIE') !== null ? Cookie::get('EMAIL_COOKIE') : '' }}">
                    <label for="floatingInput">{{ __('app.email') }}</label>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Password"
                        value="{{ Cookie::get('PASSWORD_COOKIE') !== null ? Cookie::get('PASSWORD_COOKIE') : '' }}">
                    <label for="floatingPassword">{{ __('app.password') }}</label>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check mb-0">
                        <input class="form-check-input me-2" type="checkbox" value="remember_me" id="remember_me"
                            name="remember_me" checked={{ Cookie::get('EMAIL_COOKIE') !== null }} />
                        <label class="form-check-label" for="remember_me">
                            Remember me
                        </label>
                    </div>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('app.login') }}</button>
            </form>

            <small class="d-block text-center mt-3"> {{ __('app.notregistered') }} <a href="register">
                    {{ __('app.clickhere') }}</a></small>
        </main>
    </div>
@endsection
