<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

</head>

<body class="bg-bluew-100 dark:bg-slate-950">

    <nav class="bg-bluew-300/30 dark:bg-bluew-900/10 text-gray-800 dark:text-slate-100 min-h-16 text-xl font-bold shadow-md flex flex-row items-center uppercase tracking-tight">
        <div class="basis-1/4">
            <a href="/" class="basic-6">
                <img class="max-h-14" src="/img/icons8-goals-lineal-color-96.png">
            </a>
        </div>
        <div class="basis-3/4">
            <a href="/" class="btn-navbar basic-2/4">Home</a>
            <a href="/" class="btn-navbar basic-2/4">Add new goal</a>
        </div>
        <div class="basis-1/2 text-right">
        <button class="py-2 px-4 basic-2/4 " onclick="toogleTheme()">
                <i id="icon-theme" class="fa fa-sun-o text-bluew-950 dark:text-amber-100 text-2xl"></i>
            </button>
        </div>

    </nav>


</body>

</html>