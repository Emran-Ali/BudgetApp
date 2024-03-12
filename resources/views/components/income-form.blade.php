{{--@extends('components.layout')--}}
{{--@section('content')--}}
    <div class="mx-4 text-cyan-600">
        <div
            class="border-2 border-teal-600 p-4 mt-4 rounded max-w-lg mx-auto "
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Input your Income
                </h2>
            </header>

            <form method="POST" action="/add-income">
                @csrf
                <div class="mb-4">
                    <label for="field" class="inline-block text-lg ">
                        Input Income Field
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="field" value="{{old('field')}}"
                    />
{{--                    //'required|numeric|gt:0', validation--}}
                    @error('field')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                    <input type="hidden"  name="type" value="1"/>
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

                <div class="mb-2">
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

