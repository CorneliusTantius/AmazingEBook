@extends("layouts.main")

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/registerStyle.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="main-div container col-3 text-center my-5">
        <main class="form-register">
            <h1 class="h3 my-3 fw-normal">{{ __('app.regist') }}</h1>
            <form method="POST" action="/api/register" enctype="multipart/form-data">
                @csrf
                <div class="form-floating my-2">
                    <input type="text" id="floatingInput" class="form-control @error('firstname') is-invalid @enderror"
                        name="firstname" placeholder="Kimi No Namaewa" required value="{{ old('firstname') }}">
                    <label for="floatingInput">{{ __('app.firstname') }}</label>

                    @error('firstname')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating my-2">
                    <input type="text" id="floatingInput" class="form-control @error('middlename') is-invalid @enderror"
                        name="middlename" placeholder="Kimi No Namaewa" value="{{ old('middlename') }}">
                    <label for="floatingInput">{{ __('app.midname') }}</label>

                    @error('middlename')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating my-2">
                    <input type="text" id="floatingInput" class="form-control @error('lastname') is-invalid @enderror"
                        name="lastname" placeholder="Kimi No Namaewa" required value="{{ old('lastname') }}">
                    <label for="floatingInput">{{ __('app.lastname') }}</label>

                    @error('lastname')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating my-2">
                    <input type="email" id="floatingInput" class="form-control @error('email') is-invalid @enderror"
                        name="email" placeholder="Your age" required value="{{ old('email') }}">
                    <label for="floatingInput">{{ __('app.email') }}</label>

                    @error('email')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating my-2">
                    <input type="password" id="floatingPassword"
                        class="form-control @error('password') is-invalid @enderror"
                        class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password"
                        required value="{{ old('password') }}">
                    <label for="floatingPassword">{{ __('app.password') }}</label>

                    @error('password')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating my-2">
                    <input type="password" id="floatingPassword"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                        placeholder="Confirm Password" required value="{{ old('password') }}">
                    <label for="floatingPassword">Confirm {{ __('app.password') }}</label>

                    @error('confirm_password')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group my-2 mt-5">
                    <select class="form-control custom-select @error('gender') is-invalid @enderror" id="inputGroupSelect01"
                        name="gender">
                        <option selected>{{ __('app.gender') }}</option>
                        <option value=1>{{ __('app.male') }}</option>
                        <option value=2>{{ __('app.female') }}</option>
                    </select>

                    @error('gender')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group my-2">
                    <select class="form-control custom-select @error('role') is-invalid @enderror" id="inputGroupSelect02"
                        name="role">
                        <option selected>{{ __('app.select') }} Role</option>
                        <option value=1>Admin</option>
                        <option value=2>User</option>
                    </select>

                    @error('role')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <label for="image">{{ __('app.dpict') }}</label>
                <input class="form-control form-control-sm" type="file" id="image" name="image">

                <button type="submit"
                    class="w-100 btn btn-lg btn-primary register-button mt-5">{{ __('app.regist') }}</button>
            </form>

            <small class="d-block text-center mt-3"> {{ __('app.haveacc') }} <a href="login">
                    {{ __('app.clickhere') }}</a></small>

        </main>
    </div>
@endsection
