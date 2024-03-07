<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Budget App</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    {{--        _daisyUi CDN Link--}}

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body class="antialiased">
    <div class="flex flex-row">
        @include('include/sidebar')
        <div class="m-4">
            <div class="container p-10 text-emerald-500">
                <strong class="text-6xl text-center w-full">Welcome To Asset Management App </strong>
                <p class="h-96">hello</p>
            </div>
        </div>
</div>
</body>
</html>

