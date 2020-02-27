@extends('layouts.app')

@section('content')

{{-- header and add button start --}}
<header class="flex items-center justify-between flex-wrap mx-8 my-3">
    <div class="flex items-center flex-shrink-0">
        <h1 class="w-auto text-4xl font-black text-mineshaft">{{ $list->name }}</h1>
    </div>
    <div class="w-auto block sm:flex sm:items-center sm:w-auto">
        <a href="{{ route('user.lists.items.create', $list->id) }}" class="inline-block mt-4 sm:inline-block sm:mt-0 mr-4 bg-mantis text-white py-2 px-4 rounded-full">Add</a>
    </div>
</header>
{{-- header and add button end --}}


<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap -mx-1 lg:-mx-4">

        @if (count($list->items) ===0)
        <p class="text-2xl text-mineshaftail">This list is empty!</p>
        @else

        @foreach ($list->items as $item)
          <!-- Column -->
          <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

              <!-- Article -->
              <article class="overflow-hidden rounded-lg shadow-lg">
                  <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                      <h1 class="text-2xl">
                          <a class="no-underline hover:text-safetyorange text-mineshaft" href="{{ route('user.items.show', $item->id) }}">
                            {{-- commented out possible for ItemListController --}}
                            {{-- <a class="no-underline hover:text-safetyorange text-mineshaft" href="{{ route('user.lists.items.show', $list->id, $item->id) }}"> --}}
                              {{ $item->title }}
                          </a>
                      </h1>
                      <p class="text-mineshaft text-sm">
                          {{ $item->created_at->format('d-m-yy') }}
                      </p>

                  </header>

                  <div class="mt-4 sm:mt-0 sm:ml-4 text-center sm:text-left mb-4">
                      <p class="text-sm leading-tight text-gray-600">{{ $item->price }}</p>
                      <p class="text-sm leading-tight text-gray-600">{{ $item->product_num }}</p>
                      <p class="text-sm leading-tight text-gray-600">{{ $item->url }}</p>
                      {{-- <p class="text-sm leading-tight text-gray-600">{{ $product->store->name }}</p> --}}
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
