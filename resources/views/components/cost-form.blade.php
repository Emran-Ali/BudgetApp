{{--@extends('components.layout')--}}
{{--@section('content')--}}
<x-layout>
    <div class="mx-4 text-red-500">
        <div
            class="bg-gray-50 border-2 border-teal-600 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl text-red-500 font-bold uppercase mb-1">
                    Input your daily cost
                </h2>
            </header>
            <form method="POST" action="/add-cost">
                @csrf

                <div class="mb-4">
                    <label for="accommodation" class="inline-block text-lg ">
                        Accommodation Cost
                    </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="accommodation" value="{{old('accommodation')}}"
                    />
                    {{--                    //'required|numeric|gt:0', validation--}}
                    @error('accommodation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="grocery" class="inline-block text-lg ">
                        Groceries Cost
                    </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="grocery" value="{{old('grocery')}}"
                    />
                    {{--                    //'required|numeric|gt:0', validation--}}
                    @error('grocery')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="transportation" class="inline-block text-lg ">
                        Transportation Cost
                    </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="transportation" value="{{old('transportation')}}"
                    />
                    {{--                    //'required|numeric|gt:0', validation--}}
                    @error('transportation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="others" class="inline-block text-lg ">
                        Accommodation Cost
                    </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="others" value="{{old('others')}}"
                    />
                    {{--                    //'required|numeric|gt:0', validation--}}
                    @error('others')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Add cost
                    </button>
                </div>

            </form>
        </div>
    </div>
{{--@endsection--}}
</x-layout>
