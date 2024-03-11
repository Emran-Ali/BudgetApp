{{-- @extends('components.layout') --}}
{{-- @section('content') --}}
<x-layout>
    <div class="m-4 p-4">
        <div class="radial-progress" style="--value:70; --size:12rem; --thickness: 2px;" role="progressbar">{{}}</div>
        <div class="radial-progress" style="--value:70; --size:12rem; --thickness: 2rem;" role="progressbar">70%</div>
    </div>
    <div class="mx-4 text-red-500">
    <div class="container flex">
        <div class="card  bg-sky-200 shadow-xl m-4 p-4 flex-1">
           <h1>Total Income: {{$data->total_income}}</h1>
            <h1>Total Income for this month: {{$data->monthly_income}}</h1>
        </div>
        <div class="card  bg-red-100 shadow-xl m-4 p-4 flex-1">
            <h1>Total Expense: {{$data->total_cost}}</h1>
            <h1>Total Expense for this month: {{$data->monthly_cost}}</h1>
        </div>
    </div>
</x-layout>
{{-- @endsection --}}
