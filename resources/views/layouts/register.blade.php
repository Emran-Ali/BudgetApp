@extends('welcome')
@section('content')
    <main>
        <div class="mx-4 ">
            <div class="bg-gray-50 border-2 border-teal-600 px-10 rounded max-w-lg mx-auto mt-4" >
                <header class="text-center">
                    <h2 class="text-2xl font-bold uppercase mb-1">
                        Register
                    </h2>
                    <p class="mb-2">Create an account</p>
                </header>

                <form method="POST" action="/user">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="inline-block text-lg ">
                            Name
                        </label>
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="name" value="{{old('name')}}"
                        />
                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="inline-block text-lg "
                        >Email</label
                        >
                        <input
                            type="email"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="email" value="{{old('email')}}"
                        />

                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="inline-block text-lg "
                        >Phone</label
                        >
                        <input
                            type="number"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="phone" value="{{old('phone')}}"
                        />
                        @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="occupation" class="inline-block text-lg "
                        >Occupation</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="occupation" value="{{old('occupation')}}"
                        />
                        @error('occupation')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="address" class="inline-block text-lg "
                        >Address</label
                        >
                        <input
                            type="text"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="address" value="{{old('address')}}"
                        />
                        @error('address')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label
                            for="password"
                            class="inline-block text-lg "
                        >
                            Password
                        </label>
                        <input
                            type="password"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="password"
                        />
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label
                            for="password_confirmation"
                            class="inline-block text-lg "
                        >
                            Confirm Password
                        </label>
                        <input
                            type="password"
                            class="border border-gray-200 rounded p-2 w-full"
                            name="password_confirmation"
                        />
                    </div>

                    <div class="mb-4">
                        <button
                            type="submit"
                            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                        >
                            Sign Up
                        </button>
                    </div>

                    <div class="mt-8">
                        <p>
                            Already have an account?
                            <a href="/login" class="text-laravel"
                            >Login</a
                            >
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
