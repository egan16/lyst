@extends('layouts.app')

@section('content')
{{-- header start --}}
<header class="flex items-center justify-between flex-wrap mx-8 my-3">
    <div class="flex items-center flex-shrink-0">
        <h1 class="text-4xl font-black text-mineshaft">Edit Item</h1>
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

        <form method="POST" action="{{ route('user.items.update', $item->id) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="my-4">
                <input id="title" type="text" name="title" value="{{ old('title', $item->title) }}"
                  class="input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey" autofocus>
                </input>
            </div>
            <div class="my-4">
                <input id="price" type="text" name="price" value="{{ old('price', $item->price) }}"
                  class="input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey" autofocus>
                </input>
            </div>
            <div class="my-4">
                <input id="item_code" type="text" name="item_code" value="{{ old('item_code', $item->item_code) }}"
                  class="input border border-silver text-base text-dovegrey appearance-none rounded w-full px-2 py-2 focus focus:border-dovegrey focus:outline-none active:outline-none active:border-dovegrey" autofocus>
                </input>
            </div>
            <div class="my-4">
                <input id="url" type="text" name="url" value="{{ old('url', $item->url) }}"
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



<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Edit Item</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>

                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('user.items.update', $item->id) }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">

                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $item->title) }}" />
                        </div>
                        <div class="form-group">

                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $item->price) }}" />
                        </div>
                        <div class="form-group">

                            <label for="item_code">Item Code</label>
                            <input type="text" class="form-control" id="item_code" name="item_code" value="{{ old('item_code', $item->item_code) }}" />
                        </div>
                        <div class="form-group">

                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $item->url) }}" />
                        </div>
                        <div class="form-group">
                            <label for="store">Store</label>
                            <select name="store_id">
                                @foreach ($stores as $store)
                                <option value="{{ $store->id }}" {{ (old('store_id') == $store->id) ? "selected" : "" }}>
                                    {{ $store->name }} {{ $store->region }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <a href="{{ route('user.items.index') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
