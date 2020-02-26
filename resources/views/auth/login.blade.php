@extends('layouts.app')

@section('content')

{{-- form start --}}
<div class="flex justify-center">
    <div class="w-full max-w-xs my-24">
        <h1 class="text-4xl font-black text-mineshaft mb-1">Login</h1>
        <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="my-4">
                {{-- <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Username
      </label> --}}
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address"
                  class="@error('email') is-invalid @enderror input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey"
                  autofocus>
                </input>
                @error('email')
                {{-- <div class="bg-red-lightest border border-red-light text-red-dark pl-4 pr-8 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Ooops!</strong>
                    <span class="block sm:inline">{{ $message }}</span>
                <span class="absolute pin-t pin-b pin-r pr-2 py-3">
                    <svg class="h-6 w-6 text-red" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                          d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div> --}}



            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    </div>
    <div class="mb-6">
        {{-- <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label> --}}
        <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password"
          class="@error('password') is-invalid @enderror input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey"
          autofocus>
        </input>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="mt-1">
            <input class="mt-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="text-sm font-semibold text-dovegrey form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        <a href="" class="block my-2 mb-6 text-sm font-semibold text-silver underline">Forgot Password?</a>
    </div>
    <div class="flex flex-col items-center justify-between">
        <button class="bg-mantis px-4 py-3 w-full rounded text-sm font-semibold text-white focus:outline-none text-center" type="submit">
            Log In
        </button>
        <a href="{{ route('register') }}" class="text-sm text-dovegrey py-3 w-full text-left focus:outline-none">
            Don't have an account? <span class="text-blue-500 hover:text-safetyorange">Register</span>
        </a>
    </div>
    </form>
</div>
</div>
{{-- form end --}}




{{--
  ORIGINAL CODE

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>


--}}
@endsection
