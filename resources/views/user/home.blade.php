{{-- navbar --}}
@extends('layouts.app')
{{-- content --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as an ordinary user!
                    <br>
                    <a href="{{ route('user.lists.index') }}" class="hover:text-safetyorange">View your Lists</a>
                    <br>
                    <a href="{{ route('user.items.index') }}" class="hover:text-safetyorange">View your Items</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
