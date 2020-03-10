@extends('layouts.app')

@section('content')
{{-- header start --}}
<header class="flex items-center justify-between flex-wrap mx-8 my-3">
    <div class="flex items-center flex-shrink-0">
        <h1 class="text-4xl font-black text-mineshaft">Add New Item</h1>
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

        <form method="POST" action="{{ route('user.lists.items.store', $listId) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="my-4">
                <input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Title"
                  class="input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey" autofocus>
                </input>
            </div>
            <div class="my-4">
                <input id="price" type="text" name="price" value="{{ old('price') }}" placeholder="Price"
                  class="input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey" autofocus>
                </input>
            </div>
            <div class="my-4">
                <input id="item_code" type="text" name="item_code" value="{{ old('item_code') }}" placeholder="Item Code"
                  class="input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey" autofocus>
                </input>
            </div>
            <div class="my-4">
                <input id="url" type="text" name="url" value="{{ old('url') }}" placeholder="URL"
                  class="input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey" autofocus>
                </input>
            </div>
            <div class="my-4">
                <label class="block mt-4">
                    <span class="text-gray-700">Store</span>
                    <select class="form-select mt-2 block w-full" name="store_id">
                        @foreach ($stores as $store)
                        <option value="{{ $store->id }}" {{ (old('store_id') == $store->id) ? "selected" : "" }}>
                            {{ $store->name }} {{ $store->region }}
                        </option>
                        @endforeach
                    </select>
                </label>
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
