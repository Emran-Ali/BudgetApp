@extends('welcome')
@section('content')
    <nav class="flex justify-between items-center m-4">
        <a href="/"><img class="w-24 rounded" src="{{asset('images/logo.jpeg')}}" alt="" class="logo"/></a>
        <div></div>
    </nav>
    <div class="container text-center p-10 text-rose-700">
        <strong class="text-6xl">Welcome To Asset Management App </strong>
        <p><strong class="text-yellow-500 text-3xl"> Keep Track of your asset with smart way. </strong></p>
        <div class="container mt-8 space-x-8 mr-6 text-lg  text-gray-600">
            <a href="/register" class="border-2 rounded  p-4 bg-sky-500 font-bold hover:text-red-500"><i
                    class="fa-solid fa-user-plus"></i>
                Register</a>
            <a href="/login" class="border-2 rounded  p-4 bg-sky-500  font-bold hover:text-red-500"><i
                    class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a>

        </div>
    </div>

@endsection
