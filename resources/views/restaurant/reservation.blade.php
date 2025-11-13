<head>
    @include('layouts.head', ['title' => 'Home'])
</head>

<body class="font-poppins antialiased bg-gray-100 dark:bg-gray-900">

    <!-- Navbar -->
    @include('layouts.navigation')

<h1 class="text-white">Heading for restaurant - {{ $restaurant->name }}</h1>


</body>
