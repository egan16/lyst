@extends('layouts.app')

@section('content')

{{-- home body start --}}
<div class="flex justify-center mt-24">
    <div class="w-full max-w-3xl">

        {{-- items start --}}
        <div class="relative block md:flex items-center border-gray-600">

            <div class="w-full md:w-3/5 h-full flex items-center">
                <div class="p-12 md:pr-24 md:pl-16 md:py-12 text-center">
                    <img class="object-contain h-48 w-full" src="{{ $item->image }}" />
                </div>
            </div>
            <div class="relative w-full md:w-2/5 h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg">
                <div class="text-lg text-mineshaft mb-4">
                    {{ $item->title }}
                </div>
                <div class="text-dovegrey">
                    <div class="my-2">
                        Price: {{ $item->price }}
                    </div>
                    <div class="my-2">
                        Item code: {{ $item->item_code }}
                    </div>
                    {{-- <div class="my-2">
                        {{ $item->store_id }}
                    </div> --}}
                    <div class="hover:text-safetyorange my-2">
                        <a href="{{ $item->url }}">{{ $item->url }}</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- items end --}}
        {{-- buttons start --}}
        <div class="item-center text-center my-8">
            <button class="text-yellow-500 hover:text-white hover:bg-yellow-500 border border-yellow-500 text-sm font-semibold rounded-full px-4 py-1 leading-normal">
                <a class="no-underline" href="{{ route('user.items.edit', $item->id) }}">Edit</a>
            </button>
            <form style="display:inline-block" method="POST" action="{{ route('user.items.destroy', $item->id) }}">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="text-red-500 hover:text-white hover:bg-red-500 border border-red-500 text-sm font-semibold rounded-full px-4 py-1 leading-normal">Delete</a>
            </form>
        </div>
        {{-- buttons end --}}
    </div>
</div>
{{-- home body end --}}

@endsection
