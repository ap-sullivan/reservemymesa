<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head', ['title' => 'Add New Restaurant'])
</head>


<body>

    <!-- Navbar -->
    @include('layouts.navigation')

    <main class="bg-off-white">
        <div class="pb-8">
            <div class="flex justify-center items-center">
                <h1 class="pt-4 text-2xl font-semibold md:text-4xl text-black capitalize mt-6 mb-4">
                    Publish New<span class="text-pink-500 font-bold"> Restaurant</span>
                </h1>

            </div>

            <div class="flex items-center justify-center">
                <form x-data="{ name: '', slug: '' }" method="POST" enctype="multipart/form-data"
                    action="{{ route('admin.restaurants.store') }}"
                    class="w-full max-w-3xl bg-gray-800 shadow-lg md:rounded-lg p-8 p-8 space-y-6 border border-primary">
                    {{-- cross site request forgery protection  --}}
                    @csrf


                    <div class="flex flex-col mb-2">

                        <label for="name" class="text-white mb-1 required">Restaurant Name</label>
                        <input type="text" name="name" id="name" placeholder="Tasty Restaurant"
                            value="{{ old('name') }}" required x-model="name"
                            @input="slug = name
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '')"
                            class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic" />
                    </div>


                    <div class="flex flex-col mb-2">
                        <label for="slug" class="text-white mb-1 required">Suggested URL Slug</label>
                        <input type="text" name="slug" id="slug"
                            placeholder="Only change if the slug URL is duplicated" value="{{ old('slug') }}" required
                            x-model="slug"
                            class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic" />
                    </div>

                    <div class="flex flex-col mb-6">
                        <label for="cuisine_type" class="text-white mb-1 required">Cuisine Type</label>
                        <select id="cuisine_type" name="cuisine_type"
                            class="border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500">
                            <optgroup label="Main Cuisine Served">
                                <option class="text-gray-400" value="not-specified">Select a cuisine</option>
                                @foreach ($cuisines as $cuisine)
                                        <option value="{{ $cuisine->cuisine }}">{{ $cuisine->cuisine }}</option>

                                @endforeach
                            </optgroup>
                        </select>
                    </div>


                    <div class="md:col-span-2">
                        <label for="description" class="text-white mb-1 required">Restaurant Description</label>
                        <textarea rows="6" name="description" id="description"
                            placeholder="A brief description of the restaurant - keep to 100-150 words max" value="{{ old('description') }}"
                            required
                            class="w-full h-44 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic"></textarea>
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="house_number" class="text-white mb-1">Street Number</label>
                        <input type="text" name="house_number" id="house_number" placeholder="10"
                            value="{{ old('house_number') }}"
                            class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic" />
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="address_line_1" class="text-white mb-1 required">Address Line 1</label>
                        <input type="text" name="address_line_1" id="address_line_1" placeholder="Downing Street"
                            required value="{{ old('address_line_1') }}"
                            class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic" />
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="address_line_2" class="text-white mb-1">Address Line 2</label>
                        <input type="text" name="address_line_2" id="address_line_2" placeholder=""
                            value="{{ old('address_line_2') }}"
                            class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic" />
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="city" class="text-white mb-1 required">City</label>
                        <input type="text" name="city" id="city" placeholder="e.g. Glasgow"
                            value="{{ old('city') }}" required
                            class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic" />
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="postcode" class="text-white mb-1 required">Post Code</label>
                        <input type="text" name="postcode" id="postcode" placeholder="e.g. G3 8EP"
                            value="{{ old('postcode') }}" required
                            class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic" />
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="email" class="text-white mb-1 required">Email</label>
                        <input type="email" name="email" id="email" placeholder="e.g. hello@world.com"
                            value="{{ old('email') }}" required
                            class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic" />
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="phone" class="text-white mb-1 required">Phone Number</label>
                        <input type="tel" name="phone" id="phone" placeholder="e.g. 0141 123 4567"
                            value="{{ old('phone') }}" required
                            class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic" />
                    </div>

                    <div class="flex flex-col mb-2">
                        <label for="main_contact" class="text-white mb-1">Main Contact Name</label>
                        <input type="text" name="main_contact" id="main contact" placeholder=""
                            value="{{ old('main_contact') }}"
                            class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic" />
                    </div>


                    <div class="">

                        <div class="flex flex-col mb-3">
                            <label for="path" class="text-white mb-1 required">Upload a photo</label>
                            <input type="file" name="path" placeholder="" required
                                class="w-1/2 h-14 py-2 px-2 flex justify-center rounded bg-white border-2 border-gray-700 bg-gray-900 text-white focus:ring-pink-500 focus:border-pink-500 placeholder:text-gray-400 placeholder:italic">
                        </div>

                        <button type="submit"
                            class="md:w-32 mt-4 rounded-lg bg-pink-500 py-3 px-6 text-xs font-bold uppercase text-white shadow-md transition-all hover:shadow-lgtransition ease-in-out duration-300">
                            Submit
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </main>

</body>
