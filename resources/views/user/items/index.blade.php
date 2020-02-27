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




          <table class="table-auto">
              <thead>
                  <tr>
                      <th class="px-4 py-2">Image</th>
                      <th class="px-4 py-2">Title</th>
                      <th class="px-4 py-2">Price</th>
                      <th class="px-4 py-2">Item Code</th>
                      {{-- <th class="px-4 py-2">URL</th> --}}
                      <th class="px-4 py-2">Store</th>
                      <th class="px-4 py-2">Date Added</th>
                  </tr>
              </thead>

            <tbody>
              @if (count($items) ===0)
              <p class="text-2xl">There are no items!</p>
              @else

              @foreach ($items as $item)
                <tr>
                    <td class="border px-4 py-2"><img class="object-contain h-48 w-full" src="{{ $item->image }}" /></td>
                    <td class="border px-4 py-2">
                      <a class="no-underline hover:text-safetyorange text-mineshaft" href="{{ route('user.items.show', $item->id) }}">
                        {{ $item->title }}
                      </a>
                    </td>
                    <td class="border px-4 py-2">{{ $item->price }}</td>
                    <td class="border px-4 py-2">{{ $item->item_code }}</td>
                    {{-- <td class="border px-4 py-2">{{ $item->url }}</td> --}}
                    <td class="border px-4 py-2">{{ $item->store_id }}</td>
                    <td class="border px-4 py-2">{{ $item->created_at->format('d-m-yy') }}</td>
                </tr>
              @endforeach
              @endif
            </tbody>
        </table>


        {{-- <!-- Column -->
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
            <p class="text-sm leading-tight text-gray-600">{{ $item->price }}</p>
            <p class="text-sm leading-tight text-gray-600">{{ $item->store_id }}</p>

        </div>

        </article>
        <!-- END Article -->


    </div>
    <!-- END Column --> --}}


    {{-- @endforeach
    @endif --}}

</div>
</div>



@endsection
