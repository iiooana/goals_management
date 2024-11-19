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

<body class="dark first-letter:dark:bg-bluew-950">
    <nav class="bg-bluew-900/40 text-slate-300 min-h-16 text-lg font-medium tracking-wider shadow-sm">
        <div class="columns-4">
            <div>
                <a href="/" class="">
                    <img class="max-h-14" src="/img/icons8-goals-lineal-color-96.png">
                </a>
            </div>
            <div>
                <a href="/" class="btn-navbar">Home</a>
                <a href="/" class="btn-navbar">Goals list</a>
                <button id="btn-theme" class="btn-navbar">asa
                <i class="fa fa-sun-o text-xl"></i> 
                </button>
            </div>
        </div>
    </nav> 


</body>
</html>