<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head', ['title' => 'Add New Restaurant'])
</head>


<body>

    <!-- Navbar -->
    @include('layouts.navigation')



    <section class="bg-yellow-100 w-screen">
        <div class="flex justify-center items-center">
            <h1 class="pt-4 text-2xl font-semibold md:text-4xl text-black capitalize mt-6 mb-4">
                Publish New<span class=text-primary> Restaurant</span>
            </h1>

        </div>

        <div class="flex items-center justify-center">
            <form method="post" enctype="multipart/form-data" action=""
                class="w-full max-w-2xl bg-white shadow-md rounded-xl p-8 space-y-6 border border-primary">

                <div class="flex flex-col mb-6 text-black">
                    <label for="uploaded_by" class="mb-1">Uploaded By</label>
                    <select id="uploaded_by" name="uploaded_by"
                        class="tracking-wide border-2 border-primary  focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none hover:cursor-pointer">
                        <optgroup label="admin">
                            <option value="admin1">Admin 1</option>
                            <option value="admin2">Admin 2</option>
                            <option value="admin3">Admin 3</option>
                        </optgroup>

                    </select>
                </div>

                <div class="flex flex-col mb-2">
                    <label for="articleTitle" class="mb-1">Restaurant Name</label>
                    <textarea rows="4" name="articleTitle" placeholder="Article Title"
                        class="w-full h-10 py-2 px-4 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle active:border-2 active:border-tertiary focus:outline-none"></textarea>
                </div>




                <div class="flex flex-col mb-6 text-black">
                    <label for="cuisine_type" class="mb-1">Cuisine Type</label>
                    <select id="cuisine_type" name="cuisine_type"
                        class="tracking-wide border-2 border-primary  focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none hover:cursor-pointer">
                        <optgroup label="cuisine">
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

                <div class="flex flex-col mb-2">
                    <label for="name" class="mb-1">Restaurant Name</label>
                    <input type="text" name="name" id="name" placeholder="Full name of restaurant"
                        class="w-full h-12 py-2 px-4 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none" />
                </div>




                <div class="md:col-span-2">
                    <label for="description" class="mb-1">Restaurant Description</label>
                    <textarea rows="4" name="description" id="description"
                        placeholder="A brief description of the restaurant - keep to 100-150 words max"
                        class="w-full h-20 py-2 px-4 rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none"></textarea>
                </div>


                <div class="">

                    <div class="flex flex-col mb-3">
                        <label for="imagePath" class="mb-1">Upload a photo</label>
                        <input type="file" name="imagePath" placeholder="Eg: Trainspotting"
                            class="w-1/2 h-14 py-2 px-4 flex justify-center rounded bg-white border-2 border-primary text-black placeholder-darkest-grey focus:bg-tertiary-subtle focus:border-2 focus:border-tertiary focus:outline-none">
                    </div>

                    <button type="submit"
                        class="md:w-32 bg-tertiary hover:bg-tertiary-subtle text-black font-medium py-2 px-4 rounded mt-4 transition ease-in-out duration-300">
                        Submit
                    </button>
                </div>




            </form>
        </div>
    </section>

</body>


{{-- * ! upload logic from class example! * --}}
{{-- <form method="POST" action="{{ url('/upload') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="upload" required>
    <input type="submit" value="Save Upload">
</form>

@if (!empty($upload))
    <br>
    <p><strong>ID:</strong> {{ $upload->id }}</p>
    <p><strong>Name:</strong> {{ $upload->originalName }}</p>
    <p><strong>MIME Type:</strong> {{ $upload->mimeType }}</p>
    <p><strong>Stored Path:</strong> {{ $upload->path }}</p>

    @if (str_starts_with($upload->mimeType, 'image'))
        <img src="{{ asset('storage/' . $upload->path) }}"
             alt="{{ $upload->originalName }}"
             style="max-width: 300px; height: auto;">
    @endif
@endif --}}
