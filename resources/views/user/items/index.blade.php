{{-- navbar --}}
@extends('layouts.app')
{{-- content --}}
@section('content')

{{-- header and add button start --}}
<header class="flex items-center justify-between flex-wrap mx-8 my-3">
    <div class="flex items-center flex-shrink-0">
        <h1 class="w-16 text-4xl font-black text-mineshaft">Items</h1>
    </div>
</header>
{{-- header and add button end --}}

<div class="container my-12 mx-auto px-4 md:px-12">
    <div class="flex flex-wrap sm:-mx-1 lg:-mx-4">

        {{--Table start --}}
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Price</th>
                    <th class="px-4 py-2">Item Code</th>
                    <th class="px-4 py-2">URL</th>
                    <th class="px-4 py-2">Date Added</th>
                </tr>
            </thead>

            <tbody>
                @if (count($items) ===0)
                <p class="text-2xl">There are no items!</p>
                @else

                @foreach ($items as $item)
                <tr class="text-mineshaft">
                    <td class="border px-4 py-2"><img class="object-contain h-48 w-full" src="{{ $item->image }}" /></td>
                    <td class="border px-4 py-2">
                        <a class="no-underline hover:text-safetyorange text-mineshaft" href="{{ route('user.items.show', $item->id) }}">
                            {{ $item->title }}
                        </a>
                    </td>
                    <td class="border px-4 py-2">{{ $item->price }}</td>
                    <td class="border px-4 py-2">{{ $item->item_code }}</td>
                    <td class="border px-4 py-2">
                        <a class="hover:text-safetyorange my-2" href="{{ $item->url }}">{{ $item->url }}</a>
                    </td>

                    <td class="border px-4 py-2">{{ $item->created_at->format('d-m-yy') }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

        {{-- Table end --}}
    </div>
</div>
@endsection
