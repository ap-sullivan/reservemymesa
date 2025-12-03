<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head', ['title' => 'Edit Restaurant'])
</head>


<body>

    <!-- Navbar -->
    @include('layouts.navigation')


    <main class="min-h-screen w-full bg-off-white">
        <div x-data="{ open: false, restaurantName: '', restaurantId: null, confirmText: '' }">

            <div class="flex justify-center items-center">
                <h1 class="pt-4 text-2xl font-semibold md:text-4xl text-black capitalize mt-6 mb-6"> View Existing <span
                        class="text-pink-500 font-bold">Restaurants</span>
                </h1>

            </div>
            <div class="px-6">
                <table class="border-collapse w-full ">
                    <thead>
                        <tr>
                            <th
                                class="bg-pink-500 p-3 font-bold uppercase text-white border border-grey-darkest hidden lg:table-cell tracking-wider">
                                Restaurant ID</th>
                            <th
                                class="bg-pink-500 p-3 font-bold uppercase text-white border border-grey-darkest hidden lg:table-cell tracking-wider">
                                Restaurant Name</th>
                            <th
                                class="bg-pink-500 p-3 font-bold uppercase text-white border border-grey-darkest hidden lg:table-cell tracking-wider">
                                Contact Number</th>
                            <th
                                class="bg-pink-500 p-3 font-bold uppercase text-white border border-grey-darkest hidden lg:table-cell tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!-- START OF TABLE DATA -->

                        @foreach ($restaurants as $restaurant)
                            <tr
                                class="bg-white lg:hover:bg-pink-300 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td
                                    class="w-full lg:w-auto p-3 text-grey-darkest text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-primary-lightest px-2 py-1 text-xs font-bold uppercase">Restaurant
                                        ID</span>
                                    {{ $restaurant->restaurant_id }}
                                </td>

                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-primary-lightest px-2 py-1 text-xs font-bold uppercase">Name</span>
                                    {{ $restaurant->name }}

                                </td>

                                <td
                                    class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b  block lg:table-cell relative lg:static">
                                    <span
                                        class="lg:hidden absolute top-0 left-0 bg-primary-lightest px-2 py-1 text-xs font-bold uppercase">Contact</span>
                                    {{-- <span class="rounded bg-red-400 py-1 px-3 text-s font-bold"> </span> --}}
                                    {{ $restaurant->phone }}
                                </td>


                                <td
                                    class="w-full lg:w-auto p-3 text-black text-center border border-b  block lg:table-cell relative lg:static">

                                    <span
                                        class="lg:hidden absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-primary-lightest">Actions</span>
                                    <button type="button"
                                        onclick="window.location='{{ route('admin.restaurants.edit', $restaurant->restaurant_id) }}'"
                                        class="bg-gray-800 mr-auto -subtle text-white hover:bg-gray-600 tracking-wide rounded shadow hover:shadow-lg transition ease-in-out duration-300 py-2 px-4 mb-2">
                                        Edit
                                    </button>


                                    <span
                                        class="lg:hidden absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-primary-lightest">Actions</span>

                                    <button
                                        @click="open = true; restaurantName = '{{ $restaurant->name }}'; restaurantId = {{ $restaurant->restaurant_id }};"
                                        class="bg-pink-500 text-white hover:bg-pink-900 tracking-wide rounded shadow hover:shadow-lg transition ease-in-out duration-300 py-2 px-4 transition">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>


                <!-- DELETE CONFIRMATION MODAL -->
                <div x-show="open" x-cloak x-transition.opacity
                    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 backdrop-blur-sm">
                    <div class="bg-gray-800 rounded-lg shadow-xl w-11/12 md:w-1/2 p-6">

                        <h2 class="text-xl font-bold mb-4 text-red-500">
                            Confirm Delete
                        </h2>

                        <p class="mb-4 text-white">
                            You are about to delete <strong x-text="restaurantName"></strong>.
                            <br>
                            This action <span class="font-bold text-red-500">cannot be undone</span>.
                        </p>

                        <p class="mb-2 text-white">
                            Type <strong>DELETE</strong> below to confirm:
                        </p>

                        <input type="text" x-model="confirmText" placeholder="Type DELETE..."
                            class="w-full border p-2 rounded mb-4 bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500" />

                        <div class="flex justify-end gap-3">
                            <button class="px-4 py-2 bg-white rounded" @click="open = false; confirmText = ''">
                                Cancel
                            </button>

                            <button class="px-4 py-2 bg-pink-600 text-white rounded disabled:opacity-50"
                                :disabled="confirmText !== 'DELETE'"
                                @click="
                    if (confirmText === 'DELETE') {
                        $refs.deleteForm.action = '/admin/restaurants/' + restaurantId;
                        $refs.deleteForm.submit();
                    }
                ">
                                Confirm Delete
                            </button>
                        </div>

                        <!-- Invisible form -->
                        <form x-ref="deleteForm" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                </div>

            </div>



    </main>

  <style>
        [x-cloak] {
            display: none !important;
        }
    </style>


</body>
