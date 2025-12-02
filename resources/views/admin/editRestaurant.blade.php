<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head', ['title' => 'Edit Restaurant'])
</head>


<body>

    <!-- Navbar -->
    @include('layouts.navigation')

    <main class="bg-primary-lightest">
        <div class="pb-8">
        <div class="flex justify-center items-center">
            <h1 class="pt-4 text-2xl font-semibold md:text-4xl text-black capitalize mt-6 mb-4">
                Edit<span class=text-secondary> {{ $restaurant->name }}</span>
            </h1>

        </div>

        <div class="flex items-center justify-center">
            <form x-data="{
                name: '{{ old('name', $restaurant->name) }}',
                slug: '{{ old('slug', $restaurant->slug) }}',
                cuisine_type: '{{ old('cuisine_type', $restaurant->cuisine_type) }}',
                description:'{{ old('description', $restaurant->description)}}',
                house_number:'{{ old('house_number', $restaurant->house_number)}}',
                address_line_1:'{{ old('address_line_1', $restaurant->address_line_1)}}',
                address_line_2:'{{ old('address_line_2', $restaurant->address_line_2)}}',
                city:'{{ old('city', $restaurant->city)}}',
                postcode:'{{ old('postcode', $restaurant->postcode)}}',
                email:'{{ old('email', $restaurant->email)}}',
                phone:'{{ old('phone', $restaurant->phone)}}',
                main_contact:'{{ old('main_contact', $restaurant->main_contact)}}'
                }"
                  method="POST" enctype="multipart/form-data"
                  action="{{ route('admin.restaurants.update', $restaurant->restaurant_id) }}"

             class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-8 space-y-6 border border-primary">


            {{-- cross site request forgery protection  --}}
            @csrf
            @method('PUT')

                 <div class="flex flex-col mb-2">
                    <label for="name" class="mb-1 required">Restaurant Name</label>
                    <input type="text" name="name" id="name" placeholder="Tasty Restaurant" required x-model="name"
                            @input="slug = name
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '-')
                    .replace(/^-+|-+$/g, '')"
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-secondary-light text-black placeholder-darkest-grey focus:bg-secondary-lightest focus:outline-none focus:border-none focus:ring-secondary-light" />
                </div>


                 <div class="flex flex-col mb-2">
                    <label for="slug" class="mb-1 required">Suggested URL Slug</label>
                    <input type="text" name="slug" id="slug" placeholder="Only change if the slug URL is duplicated" required  x-model="slug"
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

               <div class="flex flex-col mb-6 text-black">
                        <label for="cuisine_type" class="mb-1 required">Cuisine Type</label>
                        <select id="cuisine_type" name="cuisine_type" x-model="cuisine_type"
                            class="tracking-wide border-2 border-primary focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none hover:cursor-pointer">
                            <optgroup label="Main Cuisine Served">
                                <option value="not-specified">Select a cuisine</option>
                                @foreach ($cuisines as $cuisine)
                                        <option value="{{ $cuisine->cuisine }}">{{ $cuisine->cuisine }}</option>

                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                <div class="md:col-span-2">
                    <label for="description" class="mb-1 required">Restaurant Description</label>
                    <textarea rows="6" name="description" id="description"
                        placeholder="A brief description of the restaurant - keep to 100-150 words max" x-model="description" required
                        class="w-full h-32 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none"></textarea>
                </div>

                 <div class="flex flex-col mb-2">
                    <label for="house_number" class="mb-1">Street Number</label>
                    <input type="text" name="house_number" id="house_number" placeholder="10" x-model="house_number"
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                <div class="flex flex-col mb-2">
                    <label for="address_line_1" class="mb-1 required">Address Line 1</label>
                    <input type="text" name="address_line_1" id="address_line_1" placeholder="Downing Street" required
                       x-model="address_line_1" class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                   <div class="flex flex-col mb-2">
                    <label for="address_line_2" class="mb-1">Address Line 2</label>
                    <input type="text" name="address_line_2" id="address_line_2" placeholder=""
                        x-model="address_line_2" class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                   <div class="flex flex-col mb-2">
                    <label for="city" class="mb-1 required">City</label>
                    <input type="text" name="city" id="city" placeholder="e.g. Glasgow"
                    x-model="city" required
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                  <div class="flex flex-col mb-2">
                    <label for="postcode" class="mb-1 required">Post Code</label>
                    <input type="text" name="postcode" id="postcode" placeholder="e.g. G3 8EP" x-model="postcode" required
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                <div class="flex flex-col mb-2">
                    <label for="email" class="mb-1 required">Email</label>
                    <input type="email" name="email" id="email" placeholder="e.g. hello@world.com" x-model="email" required
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                     <div class="flex flex-col mb-2">
                    <label for="phone" class="mb-1 required">Phone Number</label>
                    <input type="tel" name="phone" id="phone" placeholder="e.g. 0141 123 4567" x-model="phone" required
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                 <div class="flex flex-col mb-2">
                    <label for="main_contact" class="mb-1">Main Contact Name</label>
                    <input type="text" name="main_contact" id="main contact" placeholder="" x-model="main_contact"
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>


                <div class="">
                    <div class="flex flex-col mb-3">
                        <label for="path" class="mb-1">Upload a photo</label>
                        <input type="file" name="path" placeholder=""
                            class="w-1/2 h-14 py-2 px-2 flex justify-center rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none">
                    </div>

                    <button type="submit"
                        class="md:w-32 bg-secondary hover:bg-secondary-light text-black font-medium py-2 px-4 rounded mt-4 transition ease-in-out duration-300">
                        Submit
                    </button>
                </div>




            </form>
        </div>

        </div>
    </main>
z
      <script>
    document.getElementById('name').addEventListener('input', function () {
        const slugInput = document.getElementById('slug');
        const slug = this.value
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, '-') // replace spaces/special chars with hyphens
            .replace(/^-+|-+$/g, '');   // trim leading/trailing hyphens
        slugInput.value = slug;
    });
</script>

</body>


