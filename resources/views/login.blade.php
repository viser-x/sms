<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('loginAsset/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('loginAsset/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('loginAsset/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('loginAsset/css/style.css') }}">

    <title>Login</title>
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('loginAsset/images/undraw_remotely_2j6y.svg') }}" alt="Image"
                        class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Sign In</h3>
                                <p class="mb-4">psum dolor Lsit amet lit. Sapiente sit aut eos consectetur
                                    adipisicing.</p>
                            </div>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group first">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"
                                        class="form-control 
                                        @error('email') is-invalid 
                                        @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control \
                                        @error('password') is-invalid 
                                        @enderror"
                                        name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span
                                            class="caption">{{ __('Remember Me') }}</span>
                                        <input type="checkbox" checked="checked" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }} />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"
                                                class="forgot-pass">{{ __('Forgot Your Password?') }}</a>
                                        @endif
                                    </span>
                                </div>

                                <button class="btn btn-block btn-primary">
                                    @if (Route::has('register'))
                                        <a class="" href="{{ route('register') }}">{{ 'Register' }}</a>
                                    @endif
                                </button>

                                <input type="submit" value="{{ __('Login') }}" class="btn btn-block btn-success">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('loginAsset/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('loginAsset/js/popper.min.js') }}"></script>
    <script src="{{ asset('loginAsset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('loginAsset/js/main.js') }}"></script>
</body>

</html>
