@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <h2> {{ $item->title }} </h2>
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Price</td>
                                <td>{{ $item->price }}</td>
                            </tr>
                            <tr>
                                <td>Product Number</td>
                                <td>{{ $item->item_code }}</td>
                            </tr>
                            <tr>
                                <td>URL</td>
                                <td>{{ $item->url }}</td>
                            </tr>
                        </tbody>

                    </table>
                    {{-- <a href="{{ route('user.lists.show', $listId) }}" class="btn btn-default">Back</a> --}}
                    <form style="display:inline-block" method="POST" action="{{ route('user.items.destroy', $item->id) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
