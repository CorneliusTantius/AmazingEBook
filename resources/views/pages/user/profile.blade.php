@extends("layouts.main")

@push('styles')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/registerStyle.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="main-div container col-3 text-center my-5">
        <main class="form-register">
            <h1 class="h3 my-3 fw-normal">{{ __('app.profile') }}</h1>
            <div class="profile mb-3"> <img src="{{ Storage::url(Auth::user()->display_picture_link) }}"" class="
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                      rounded-circle"
                    width="200"> </div>
            <form method="POST" action="/api/profile" enctype="multipart/form-data">
                @csrf
                <div class="form-floating my-2">
                    <input type="text" id="floatingInput" class="form-control @error('firstname') is-invalid @enderror"
                        name="firstname" placeholder="Kimi No Namaewa" required value="{{ $user->first_name }}">
                    <label for="floatingInput">{{ __('app.firstname') }}</label>

                    @error('firstname')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating my-2">
                    <input type="text" id="floatingInput" class="form-control @error('middlename') is-invalid @enderror"
                        name="middlename" placeholder="Kimi No Namaewa" value="{{ $user->middle_name }}">
                    <label for="floatingInput">{{ __('app.midname') }}</label>

                    @error('middlename')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating my-2">
                    <input type="text" id="floatingInput" class="form-control @error('lastname') is-invalid @enderror"
                        name="lastname" placeholder="Kimi No Namaewa" required value="{{ $user->last_name }}">
                    <label for="floatingInput">{{ __('app.lastname') }}</label>

                    @error('lastname')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating my-2">
                    <input type="email" id="floatingInput" class="form-control @error('email') is-invalid @enderror"
                        name="email" placeholder="Your age" required value="{{ $user->email }}">
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
                        value="{{ old('password') }}">
                    <label for="floatingPassword">{{ __('app.password') }}</label>

                    @error('password')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="input-group my-2 mt-5">
                    <select class="form-control custom-select @error('gender') is-invalid @enderror" id="inputGroupSelect01"
                        name="gender">
                        <option selected>{{ __('app.gender') }}</option>
                        <option value=1 @if ($user->gender_id == 1) selected @endif>{{ __('app.male') }}</option>
                        <option value=2 @if ($user->gender_id == 2) selected @endif>{{ __('app.female') }}</option>
                    </select>

                    @error('gender')
                        <div class="invalid-feedback error-message">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group my-2">
                    <select class="form-control custom-select @error('role') is-invalid @enderror" id="inputGroupSelect02"
                        name="role" disabled>
                        <option>{{ __('app.select') }} Role</option>
                        <option value=1 @if ($user->role_id == 1) selected @endif>Admin</option>
                        <option value=2 @if ($user->role_id == 2) selected @endif>User</option>
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
                    class="w-100 btn btn-lg btn-primary register-button mt-5">{{ __('app.update') }}</button>
            </form>

        </main>
    </div>
@endsection
