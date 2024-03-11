{{--@extends('components.layout')--}}
{{--@section('content')--}}
<x-layout >
    @dd(auth()->user())
    <div class="text-3xl">Hello {{$data->name}}</div>
</x-layout>
{{--@endsection--}}

