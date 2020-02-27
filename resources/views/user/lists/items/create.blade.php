@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Add new item</div>

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
                    <form method="POST" action="{{ route('user.lists.items.store', $listId) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" />
                        </div>
                        <div class="form-group">
                            <label for="item_code">Item Code</label>
                            <input type="text" class="form-control" id="item_code" name="item_code" value="{{ old('item_code') }}" />
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}" />
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

                        <a href="{{ route('user.lists.index') }}" class="btn btn-outline">Cancel</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
