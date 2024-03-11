<!doctype html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: '#ef3b2d',
                    },
                },
            },
        }

    </script>
</head>
<body>
@include('components.flash-message')
<div class=" container flex flex-row">
    <div class=" basis-1/4 ">
        @include('components.sidebar')
    </div>
    <div class="basis-3/4 w-fit">
        <div class="container bg-cyan-500 top-0">
            <nav class="flex justify-between items-center p-4 ">
                <span class="font-bold uppercase">
                    Welcome {{auth()->user()->name}}
                </span>
                <form class="inline px-4" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa-solid fa-sign-out"></i> Logout
                    </button>
                </form>
            </nav>
        </div>
        <div>
            <main>
                {{--                @yield('content')--}}
                {{$slot}}
            </main>
        </div>
    </div>
</div>
</body>
</html>
