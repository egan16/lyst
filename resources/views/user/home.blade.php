{{-- navbar --}}
@extends('layouts.app')
{{-- content --}}
@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

{{-- header start --}}
<header class="flex items-center justify-between flex-wrap mx-8 my-3">
    <div class="flex items-center flex-shrink-0">
        <h1 class="w-full text-4xl font-black text-mineshaft">Welcome, {{ Auth::user()->name }}</h1>
    </div>
</header>
{{-- header end --}}

{{-- home body start --}}
<div class="flex justify-center mt-24">
    <div class="w-full max-w-3xl">

    {{-- lists card start --}}
    <div class="relative block md:flex items-center border-b-2 border-gray-600">

      <div class="w-full md:w-3/5 h-full flex items-center">
        <div class="p-12 md:pr-24 md:pl-16 md:py-12 text-center">
          <span class="text-lg text-mineshaft">Click here to view your lists. </span><p class="text-dovegrey">This section is where you can manage all of your lists and manage the items you have added from the web extension</p>
        </div>
      </div>
      <div class="relative w-full md:w-2/5 h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg">
        <a href="{{ route('user.lists.index') }}" class="inline-block mt-4 sm:inline-block sm:mt-0 bg-mantis text-white py-2 px-4 rounded-full hover:bg-safetyorange">View Your Lists</a>
      </div>
    </div>
    {{-- lists card end --}}

    {{-- items card start --}}
    <div class="relative rounded-lg block md:flex items-center">
      <div class="relative w-full md:w-2/5 h-full overflow-hidden rounded-t-lg md:rounded-t-none md:rounded-l-lg ml-24">
        <a href="{{ route('user.items.index') }}" class="inline-block mt-4 sm:inline-block sm:mt-0 bg-mantis text-white py-2 px-4 rounded-full hover:bg-safetyorange">View Your Items</a>
      </div>
      <div class="w-full md:w-3/5 h-full flex items-center">
        <div class="p-10 md:pr-22 md:pl-14 md:py-12 mr-6 text-center">
          <span class="text-lg text-mineshaft">Click here to view your Items. </span><p class="text-dovegrey">This section is where you can manage all of your Items you have added from the web extension</p>
        </div>
      </div>
    </div>
    {{-- items card end --}}

  </div>
</div>
{{-- home body end --}}

@endsection
