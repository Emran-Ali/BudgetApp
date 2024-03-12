{{--@extends('components.layout')--}}
{{--@section('content')--}}
<x-layout>
    <div class="mx-4 text-red-500">
        <div
            class="bg-gray-50 border-2 border-teal-600 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl text-red-500 font-bold uppercase mb-1">
                    Add Your Current Month Budget
                </h2>
            </header>
            <form method="POST" action="/add-budget">
                @csrf
                <input type="hidden"  name="type" value=3 />
                <div class="mb-4">
                    <label for="amount" class="inline-block text-lg ">
                        Amount
                    </label>
                    <input
                        type="number"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="amount" value="{{old('amount')}}"
                    />
                    @error('amount')
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
