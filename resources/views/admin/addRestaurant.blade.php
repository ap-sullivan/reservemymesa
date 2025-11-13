<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head', ['title' => 'Add New Restaurant'])
</head>


<body>

    <!-- Navbar -->
    @include('layouts.navigation')

    <main class="bg-primary-lightest">
        <div class="pb-8">
        <div class="flex justify-center items-center">
            <h1 class="pt-4 text-2xl font-semibold md:text-4xl text-black capitalize mt-6 mb-4">
                Publish New<span class=text-secondary> Restaurant</span>
            </h1>

        </div>

        <div class="flex items-center justify-center">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.restaurants.store')}}"
             class="w-full max-w-2xl bg-white shadow-lg rounded-lg p-8 space-y-6 border border-primary">
            {{-- cross site request forgery protection  --}}
            @csrf


                 <div class="flex flex-col mb-2">
                    <label for="name" class="mb-1">Restaurant Name</label>
                    <input type="text" name="name" id="name" placeholder="" value="{{ old('name') }}"required
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>


                 <div class="flex flex-col mb-2">
                    <label for="slug" class="mb-1">Suggested URL Slug</label>
                    <input type="text" name="slug" id="slug" placeholder="Only change if the slug URL is duplicated" value="{{ old('slug') }}" required
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                <div class="flex flex-col mb-6 text-black">
                    <label for="cuisine_type" class="mb-1">Cuisine Type</label>
                    <select id="cuisine_type" name="cuisine_type"
                        class="tracking-wide border-2 border-primary  focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none hover:cursor-pointer">
                        <optgroup label="Main Cuisine Served">
                            <option value="not-specified"></option>
                            <option value="chinese">Chinese</option>
                            <option value="italian">Italian</option>
                            <option value="mexican">Mexican</option>
                            <option value="indian">Indian</option>
                            <option value="japanese">Japanese</option>
                            <option value="french">French</option>
                            <option value="thai">Thai</option>
                            <option value="greek">Greek</option>
                            <option value="spanish">Spanish</option>
                            <option value="american">American</option>
                        </optgroup>

                    </select>
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="mb-1">Restaurant Description</label>
                    <textarea rows="6" name="description" id="description"
                        placeholder="A brief description of the restaurant - keep to 100-150 words max" value="{{ old('description') }}"
                        class="w-full h-32 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none"></textarea>
                </div>

                 <div class="flex flex-col mb-2">
                    <label for="house_number" class="mb-1">Street Number</label>
                    <input type="text" name="house_number" id="house_number" placeholder="...or Building Name" value="{{ old('house_number') }}"
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                <div class="flex flex-col mb-2">
                    <label for="address_line_1" class="mb-1">Address Line 1</label>
                    <input type="text" name="address_line_1" id="address_line_1" placeholder=""
                       value="{{ old('address_line_1') }}" class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                   <div class="flex flex-col mb-2">
                    <label for="address_line_2" class="mb-1">Address Line 2</label>
                    <input type="text" name="address_line_2" id="address_line_2" placeholder=""
                        value="{{ old('address_line_2') }}" class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                   <div class="flex flex-col mb-2">
                    <label for="city" class="mb-1">City</label>
                    <input type="text" name="city" id="city" placeholder="e.g. Glasgow" value="{{ old('city') }}"
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                  <div class="flex flex-col mb-2">
                    <label for="postcode" class="mb-1">Post Code</label>
                    <input type="text" name="postcode" id="postcode" placeholder="e.g. G3 8EP" value="{{ old('postcode') }}"
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                <div class="flex flex-col mb-2">
                    <label for="email" class="mb-1">Email</label>
                    <input type="email" name="email" id="email" placeholder="e.g. hello@world.com" value="{{ old('email') }}"
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                     <div class="flex flex-col mb-2">
                    <label for="phone" class="mb-1">Phone Number</label>
                    <input type="tel" name="phone" id="phone" placeholder="e.g. 0141 123 4567" value="{{ old('phone') }}"
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>

                 <div class="flex flex-col mb-2">
                    <label for="main_contact" class="mb-1">Main Contact Name</label>
                    <input type="text" name="main_contact" id="main contact" placeholder="" value="{{ old('main_contact') }}"
                        class="w-full h-12 py-2 px-2 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>


                <div class="">

                    <div class="flex flex-col mb-3">
                        <label for="path" class="mb-1">Upload a photo</label>
                        <input type="file" name="path" placeholder="" required
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

