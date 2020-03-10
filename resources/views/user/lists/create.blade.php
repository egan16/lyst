@extends('layouts.app')

@section('content')
{{-- header start --}}
<header class="flex items-center justify-between flex-wrap mx-8 my-3">
    <div class="flex items-center flex-shrink-0">
        <h1 class="text-4xl font-black text-mineshaft">Add New List</h1>
    </div>
</header>
{{-- header end --}}

{{-- form start --}}
<div class="flex justify-center">
    <div class="w-full max-w-sm my-24">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>

                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('user.lists.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="my-4">
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Name your list"
                  class="input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey" autofocus>
                </input>
            </div>
            <div class="my-4">
                <span class="text-gray-700">Make list public?</span>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" id="is_public" name="is_public" value="1" checked="checked">
                        <span class="ml-2">Yes</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" class="form-radio" id="is_public" name="is_public" value="0">
                        <span class="ml-2">No</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-between mt-8">
                <button class="text-yellow-500 hover:text-white hover:bg-yellow-500 border border-yellow-500 text-sm font-semibold rounded-full px-4 py-1 leading-normal">
                    <a href="{{ route('user.lists.index') }}" class="btn btn-outline">Cancel</a>
                </button>
                <button type="submit" class="bg-mantis text-white hover:bg-safetyorange text-sm font-semibold rounded-full px-4 py-1 leading-normal">Submit</button>
            </div>
        </form>
    </div>
</div>
{{-- form end --}}

@endsection
