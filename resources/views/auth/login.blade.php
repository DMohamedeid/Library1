@extends('adminViews.outepages')

@section('content')
    <div class="text-center">
        <a href="index.html">
            <span><img src="../../admin/images/small/img.jpg" alt="" height="60"></span>
        </a>
        <p class="text-muted mt-2 mb-4">Welcome Again</p>
    </div>
    <div class="card bg-soft-dark">

        <div class="card-body p-4">

            <div class="text-center mb-4">
                <h4 class="text-uppercase mt-0">Sign In</h4>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="enter your email" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="enter your password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <div class="custom-control custom-checkbox">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group mb-0 text-center">
                    <button class="btn btn-primary btn-block" type="submit"> {{ __('Login') }} </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link font-weight-bolder  mt-3" style="color: white" href="{{ route('password.request') }}">
                            <i class="fa fa-lock mr-1"></i> {{ __('Forgot Your Password?') }}

                        </a>
                        <p style="color: white">Don't have an account? <a href="{{ route('register') }}" class="text-dark ml-1"><b style="color: gold">{{ __('Register') }}</b></a></p>
                        </a>
                    @endif
                </div>

            </form>
@stop
