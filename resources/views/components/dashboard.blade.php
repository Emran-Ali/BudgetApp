{{-- @extends('components.layout') --}}
{{-- @section('content') --}}
<x-layout>
    @php
        $ratio = $monthlyBudget > 0 &&  $monthlyBudget> $monthlyCost ?
        ($monthlyBudget-$monthlyCost) / $monthlyBudget : 0;
        $ratio*=100;
    @endphp
    <div class="m-4 p-4 text-gray-950 text-2xl">
        <div class="container flex">
            <div class="flex-1">
                <h1>Remaing Budget:</h1>
                <div class="radial-progress border-sky-500 border-4  bg-red-100"
                     style="--value:{{(int)$ratio}}; --size:12rem; --thickness: 1rem;"
                     role="progressbar"> {{(int)$ratio}}%
                </div>
            </div>
            <div class="card font-bold  flex-1">

                <div class="card font-bold bg-sky-200 shadow-xl m-4 p-4 flex-1">
                    <a href="/incomes">
                        <h1>Total Income: {{$totalIncome}}</h1>
                    </a>
                </div>

                <div class="card font-bold bg-red-100 shadow-xl m-4 p-4 flex-1">
                    <a href="/expenses">
                        <h1>Total Expense: {{$totalExpense}}</h1>
                    </a>
                </div>
                <div class="card font-bold bg-yellow-200 shadow-xl m-4 p-4 flex-1">
                    <a href="/expenses">
                        <h1>Your Overall Savings: {{$totalIncome - $totalExpense}}</h1>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="divider divider-success text-xl font-bold   ">{{date('F Y')}}</div>

    <div class="mx-4 text-gray-950 text-2xl">
        <div class="container flex">

            <div class="card font-bold bg-sky-200 shadow-xl m-4 p-4 flex-1">
                <h1>Budget for This Mounth: {{$monthlyBudget}}</h1>
            </div>
            <div class="card font-bold bg-red-100 shadow-xl m-4 p-4 flex-1">
                <h1>Remaining Budget : {{$monthlyBudget-$monthlyCost}}</h1>
            </div>
        </div>
    </div>
    <div class="mx-4 text-gray-950 text-2xl">
        <div class="container flex">
            <div class="card font-bold bg-sky-200 shadow-xl m-4 p-4 flex-1">
                <h1>Current Month Income: {{$monthlyIncome}}</h1>
                {{--            <h1>Total Income for this month: {{$data->monthly_income}}</h1>--}}
            </div>
            <div class="card font-bold  bg-red-100 shadow-xl m-4 p-4 flex-1">
                <h1>Current Month Expense: {{$monthlyCost}}</h1>
                {{--            <h1>Total Expense for this month: {{$data->monthly_cost}}</h1>--}}
            </div>
        </div>
    </div>
</x-layout>
{{-- @endsection --}}
