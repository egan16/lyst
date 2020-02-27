@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">Edit list</div>

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
                    <form method="POST" action="{{ route('user.lists.update', $listModel->id) }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">

                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $listModel->name) }}" />
                        </div>
                        <div class="form-group">
                            <label for="is_public">Make lyst public</label>
                            <input type="radio" class="form-control" id="is_public" name="is_public" value="1" checked="checked">Yes
                            <input type="radio" class="form-control" id="is_public" name="is_public" value="0">No
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
