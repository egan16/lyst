@extends('layouts.app')

@section('content')

{{-- form start --}}
<div class="flex justify-center my-24">
    <div class="w-full max-w-xs">
        <h1 class="text-4xl font-black text-mineshaft mb-1">Register</h1>
        <form method="POST" action="{{ route('register') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="my-4">
                <input id="name" type="textname" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Username"
                  class="@error('name') is-invalid @enderror input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey"
                  autofocus>
                </input>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="my-4">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address"
                  class="@error('email') is-invalid @enderror input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey"
                  autofocus>
                </input>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="my-4">
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password"
                  class="@error('password') is-invalid @enderror input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey"
                  autofocus>
                </input>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-6">
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"
                  class="@error('password-confirm') is-invalid @enderror input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey"
                  autofocus>
                </input>
                @error('password-confirm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="flex flex-col items-center justify-between">
                <button class="bg-mantis px-4 py-3 w-full rounded text-sm font-semibold text-white focus:outline-none text-center" type="submit">
                    Register
                </button>
                <a href="{{ route('login') }}" class="text-sm text-dovegrey py-3 w-full text-left focus:outline-none">
                    Already have an account? <span class="text-blue-500 hover:text-safetyorange">Log in</span>
                </a>
            </div>
        </form>
    </div>
</div>
{{-- form end --}}





{{-- OLD CODE --}}

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
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
</div> --}}
@endsection
