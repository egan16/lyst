{{-- navbar --}}
@extends('layouts.app')
{{-- content --}}
@section('content')

{{-- header and add button start --}}
<header class="flex items-center justify-between flex-wrap mx-8 my-3">
    <div class="flex items-center flex-shrink-0">
        <h1 class="w-16 text-4xl font-black text-mineshaft">Items</h1>
    </div>
    {{-- <div class="w-auto block sm:flex sm:items-center sm:w-auto">
        <a href="{{ route('user.lists.create') }}" class="inline-block mt-4 sm:inline-block sm:mt-0 mr-4 bg-mantis text-white py-2 px-4 rounded-full">Add</a>
    </div> --}}
</header>
{{-- header and add button end --}}



<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        @if (count($items) ===0)
        <p class="text-2xl">There are no lists!</p>
        @else

        @foreach ($items as $item)
        <!-- Column -->
        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">


            <!-- Article -->
            <article class="overflow-hidden rounded-lg shadow-lg">

              <img class="w-1/3" src="{{ $item->image }}" />


                <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                    <h1 class="text-2xl">
                        <a class="no-underline hover:text-safetyorange text-mineshaft" href="{{ route('user.items.show', $item->id) }}">
                            {{ $item->title }}
                        </a>
                    </h1>
                    <p class="text-mineshaft text-sm">
                        {{ $item->created_at->format('d-m-yy') }}
                    </p>

                </header>

                <div class="mt-4 sm:mt-0 sm:ml-4 text-center sm:text-left mb-4">
                    <p class="text-sm leading-tight text-gray-600">{{ $item->item_code }}</p>
                    <p class="text-sm leading-tight text-gray-600">{{ $item->url }}</p>
                    <p class="text-sm leading-tight text-gray-600">{{ $item->store_id }}</p>
                    {{-- <div class="mt-4">
                        <button class="text-yellow-500 hover:text-white hover:bg-yellow-500 border border-yellow-500 text-xs font-semibold rounded-full px-4 py-1 leading-normal">
                          <a class="no-underline" href="{{ route('user.lists.edit', $item->id) }}">Edit</a>
                          </button>
                        <form style="display:inline-block" method="POST" action="{{ route('user.lists.destroy', $list->id) }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="text-red-500 hover:text-white hover:bg-red-500 border border-red-500 text-xs font-semibold rounded-full px-4 py-1 leading-normal">Delete</button>

                        </form>
                    </div> --}}
                </div>

            </article>
            <!-- END Article -->


        </div>
        <!-- END Column -->
        @endforeach
        @endif

    </div>
</div>



@endsection


{{--
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 class="">
                    Lysts
                    <a href="{{ route('user.lists.create') }}" class="bg-mantis text-white font-bold py-2 px-4 rounded">Add</a>
                </h1>
                <div class="card-body">

                    @if (count($listModels) ===0)
                    <p>There are no lysts!</p>
                    @else
                    <table id="table-lists" class="table table hover">
                        <thead>
                            <th>Name</th>
                            <th>Public</th>
                            <th>Created by</th>
                        </thead>
                        <tbody>



                            @foreach ($listModels as $listModel)
                            <tr data-id="{{ $listModel->id }}">
                                <td>{{ $listModel->name }}</td>
                                <td>{{ $listModel->is_public }}</td>
                                <td>{{ $listModel->user_uuid }}</td>
                                <td>
                                    <a href="{{ route('user.lists.show', $listModel->id) }}" class="btn btn-default">View</a>
                                    <a href="{{ route('user.lists.edit', $listModel->id) }}" class="btn btn-warning">Edit</a>
                                    <form style="display:inline-block" method="POST" action="{{ route('user.lists.destroy', $listModel->id) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
