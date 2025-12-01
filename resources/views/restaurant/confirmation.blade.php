@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white rounded-lg shadow p-6 text-center">

    @if(session('success'))
        <div class="mb-4 text-green-600 font-semibold text-lg">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-2xl font-bold">Booking Confirmed</h1>

    <p class="text-gray-600 mt-2">
        Thank you for your reservation. We look forward to welcoming you!
    </p>

    <a href="{{ route('home') }}"
       class="mt-6 inline-block bg-pink-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-pink-600">
        Return Home
    </a>

</div>
@endsection
