<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Budget App</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

{{--        _daisyUi CDN Link--}}

        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>


    </head>
    <body class="antialiased">
            @if (Route::has('login'))

                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        @include('include/navbar')

                    @endauth
            @endif
            <div class="container p-10 text-emerald-500">
                <strong class="text-6xl">Welcome To Asset Management App </strong>
                <p><strong class="text-white"> Manage Your Asset . Keep Track of your asset. </strong></p>
            </div>
    </body>
</html>
