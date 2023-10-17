{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>Login</title>
</head>
<div class="login"> 
    <div class="login__content">
        <div class="login__img">
            <img src="{{asset('img/logo.png')}}" alt="">
        </div>

        <div class="login__forms">
            <form method="POST" action="{{ route('register') }}" class="login__registre" id="login-in">
                    @csrf
                <h1 class="login__title" style="font-weight: bold">Registrarse</h1>

                <div class="login__box">
                    <i class='bx bx-user login__icon'></i>
                    <input id="name" type="text" placeholder="Nombre" class="login__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                </div>

                @error('name')
                    <span id="error" class="login__forgot">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="login__box">
                    <i class='bx bx-user login__icon'></i>
                    <input id="email" type="email" placeholder="Correo" class="login__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                @error('email')
                    <span id="error" class="login__forgot">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="login__box">
                    <i class='bx bx-user login__icon'></i>
                    <input id="password" type="password" placeholder="Contraseña" class="login__input @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                </div>

                @error('password')
                    <span id="error" class="login__forgot">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="login__box">
                    <i class='bx bx-user login__icon'></i>
                    <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="login__input @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation" autofocus>
                </div>

                <div align="center">
                    <button type="submit" class="login__button">
                        {{ __('Register') }}
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</div>

 <script src="{{asset('js/login.js')}}"></script>
@endsection
