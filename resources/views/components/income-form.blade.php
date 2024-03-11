{{--@extends('components.layout')--}}
{{--@section('content')--}}
<x-layout>
    <div class="mx-4 text-cyan-600">
        <div
            class="bg-gray-50 border-2 border-teal-600 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Input your Income
                </h2>
            </header>

            <form method="POST" action="/add-income">
                @csrf
                <div class="mb-4">
                    <label for="salary" class="inline-block text-lg ">
                        Salary
                    </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="salary" value="{{old('salary')}}"
                    />
{{--                    //'required|numeric|gt:0', validation--}}
                    @error('salary')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="others" class="inline-block text-lg ">
                        Others Income
                    </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="others" value="{{old('others')}}"
                    />
                    @error('others')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Add Income
                    </button>
                </div>
            </form>
        </div>
    </div>
{{--@endsection--}}
</x-layout>
