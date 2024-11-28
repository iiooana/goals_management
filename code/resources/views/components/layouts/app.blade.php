<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? '' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-bluew-100 dark:bg-slate-950">
    <x-nav/>
    <div class="container-md mx-auto py-4 px-5">
        <h1 class="text-center font-black uppercase text-4xl dark:text-slate-50 mb-2 ">{{ $title ?? '' }}</h1>
        {{ $slot }}
    </div>
</body>

</html>