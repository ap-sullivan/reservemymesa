<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head', ['title' => 'Home'])
</head>


<body class="font-poppins antialiased bg-gray-100 dark:bg-gray-900">

    <!-- Navbar -->
    @include('layouts.navigation')


    <!-- Page Content -->
    <main class=" min-h-screen p-16">

<div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow mb-10 max-w-4xl mx-auto">
    <form method="GET" action="{{ route('home') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">


        <!--cuisine filter -->
        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">
                Cuisine
            </label>
            <select name="cuisine" class="w-full rounded-lg border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500">
                <option value="">All</option>
                @foreach ($cuisines as $cuisine)
                    <option value="{{ $cuisine }}" {{ request('cuisine') === $cuisine ? 'selected' : '' }}>
                        {{ $cuisine }}
                    </option>
                @endforeach
            </select>
        </div>

        <!--city filter -->
        <div>
            <label class="block text-sm font-medium mb-1 text-gray-700 dark:text-gray-300">
                City
            </label>
            <select name="city" class="w-full rounded-lg border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500">
                <option value="">All</option>
                @foreach ($cities as $city)
                    <option value="{{ $city }}" {{ request('city') === $city ? 'selected' : '' }}>
                        {{ $city }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- apply filter -->
        <div class="flex items-end">
            <button
                class="w-full bg-pink-500 text-white py-2 px-4 rounded-lg font-semibold hover:bg-pink-600 shadow">
                Apply Filters
            </button>
        </div>
        {{-- clear button --}}
        <div class="flex items-end">
    <a
        href="{{ route('home') }}"
        class="w-full text-center bg-gray-300 text-gray-800 py-2 px-4 rounded-lg font-semibold hover:bg-gray-400 shadow"
    >
        Clear
    </a>
</div>

    </form>
</div>

 {{-- card container --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
@foreach ($restaurants as $restaurant)

    {{-- card --}}
<div class="relative flex flex-col h-full rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">

    <div class="relative h-56 overflow-hidden rounded-t-xl bg-blue-gray-500 bg-clip-border text-white">
      <img
     src="{{ optional($restaurant->images->first())->path
        ? asset('storage/' . $restaurant->images->first()->path)
        : asset('default.jpg') }}"
    alt="image of {{ $restaurant->name }}"
    class="object-cover w-full h-full"
/>
    </div>
    <div class="p-6 flex-1">
       <h5 class="text-xl font-semibold text-blue-gray-900 mb-1">
                    {{ $restaurant->name }}
        </h5>
        <p class="text-sm mb-2">
            <span class="mr-2">{{ $restaurant->cuisine_type }}</span>&#x2022;<span class="ml-2">{{ $restaurant->city }}</span>
            </p>

        <p class="text-sm font-light leading-relaxed">
            {{ $restaurant->description }}
        </p>
    </div>
    <div class="p-6 pt-0 mt-auto">

        <a href="{{ route('restaurants.reservation', ['slug' => $restaurant->slug]) }}" class="rounded-lg bg-pink-500 py-3 px-6 text-xs font-bold uppercase text-white shadow-md transition-all hover:shadow-lg">
            Make Reservation
        </a>
    </div>
</div>


  @endforeach

</div>






</main>

    @include('layouts.footer')
</body>
</html>
