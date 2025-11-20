<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head', ['title' => 'Edit Restaurant'])
</head>


<body>

    <!-- Navbar -->
    @include('layouts.navigation')


<main class="min-h-screen w-full bg-off-white">
<div class="flex justify-center items-center">
  <h1 class="pt-4 text-2xl font-semibold md:text-4xl text-black capitalize mt-6 mb-6">  View Existing <span class=text-secondary>Restaurants</span>
                </h1>

  </div>
<div class="px-6">
<table class="border-collapse w-full ">
    <thead>
        <tr>
            <th class="bg-secondary-lighter p-3 font-bold uppercase text-black border border-grey-darkest hidden lg:table-cell">Restaurant ID</th>
            <th class="bg-secondary-lighter p-3 font-bold uppercase text-black border border-grey-darkest hidden lg:table-cell">Restaurant Name</th>
            <th class="bg-secondary-lighter p-3 font-bold uppercase text-black border border-grey-darkest hidden lg:table-cell">Contact Number</th>
            <th class="bg-secondary-lighter p-3 font-bold uppercase text-black border border-grey-darkest hidden lg:table-cell">Actions</th>
        </tr>
    </thead>
    <tbody>

    <!-- START OF TABLE DATA -->

@foreach ($restaurants as $restaurant)
        <tr class="bg-white lg:hover:bg-secondary-lightest flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
            <td class="w-full lg:w-auto p-3 text-grey-darkest text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-primary-lightest px-2 py-1 text-xs font-bold uppercase">Restaurant ID</span>
                       {{$restaurant->restaurant_id}}
            </td>

            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-primary-lightest px-2 py-1 text-xs font-bold uppercase">Restaurant Name</span>
                       {{$restaurant->name}}

            </td>

          	<td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-primary-lightest px-2 py-1 text-xs font-bold uppercase">Contact Number</span>
                {{-- <span class="rounded bg-red-400 py-1 px-3 text-s font-bold"> </span> --}}
                 {{$restaurant->phone}}
          	</td>


              <td class="w-full lg:w-auto p-3 text-black text-center border border-b  block lg:table-cell relative lg:static">

                <span class="lg:hidden absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-primary-lightest">Edit</span>
                <a href="{{ route('admin.restaurants.edit', $restaurant->restaurant_id) }}"
                    class=" bg-primary-light mr-auto -subtle text-white hover:bg-primary-lightest hover:text-black tracking-wide rounded shadow hover:shadow-lg transition ease-in-out duration-300 py-2 px-4 mb-2 " value='Edit User'>Edit Restaurant</a>

            </td>
        </tr>


           @endforeach


    </tbody>
</table>


</main>




</body>
