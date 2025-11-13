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



 {{-- card container --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
@foreach ($restaurants as $restaurant)
    {{-- card --}}
   <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
    <div class="relative h-56 overflow-hidden rounded-t-xl bg-blue-gray-500 bg-clip-border text-white">
        <img
            src="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80"
            alt="img-blur-shadow"
            class="object-cover w-full h-full"
        />
    </div>
    <div class="p-6">
       <h5 class="mb-2 text-xl font-semibold text-blue-gray-900">
                    {{ $restaurant->name }}
                </h5>
        <p class="text-base font-light leading-relaxed">
            {{ $restaurant->description }}
        </p>
    </div>
    <div class="p-6 pt-0">



        <a href="{{ route('restaurants.reservation', ['slug' => $restaurant->slug]) }}" class="rounded-lg bg-pink-500 py-3 px-6 text-xs font-bold uppercase text-white shadow-md transition-all hover:shadow-lg">
            Make Reservation
        </a>
    </div>
</div>
  @endforeach

</div>






</main>


</body>
</html>
