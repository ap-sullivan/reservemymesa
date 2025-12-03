<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head', ['title' => 'Add New Restaurant'])
</head>


<body>

    <!-- Navbar -->
    @include('layouts.navigation')

    <main class="">

<div class="relative">
    <div class="w-full h-56">
        <img
            src="{{ asset('/banner.jpg') }}"
            class="w-full h-full object-cover"
        />
    </div>


    <div class="absolute left-1/2 -translate-x-1/2 bottom-[-60px]">
        <img
            src="/logo/mesa-logo-dark-pink.png"
            class="w-40 h-40 rounded-full border border-4 border-pink-500"
        />
    </div>
</div>


    <div class="py-12 mt-16">

        <h2 class="text-center mb-8 font-semi-bold">Welcome back {{ $user->name }}!</h2>
        <div class="px-2 md:px-0 w-full md:max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Upcoming Reservations -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.upcoming-reservations')
                </div>
            </div>

            <!-- Profile Info -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Password Update -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>

    </main>
</body>
