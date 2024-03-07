<div class="w-full text-white navbar bg-teal-600">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </div>
        </div>
        <strong class="px-6 font-bold  text-3xl">Asset Management</strong>
    </div>

    <div class="text-white navbar-end px-6">
        <a href="{{ route('login') }}" class="font-semibold  hover:text-gray-900  dark:hover:text-white ">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class=" ml-4 font-semibold  hover:text-gray-900  dark:hover:text-white ">Register</a>
        @endif
    </div>
</div>
