<?php

namespace App\Http\Controllers;

use App\Enums\Finance;
use App\Models\Budget;
use App\Models\IncomeExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{

    //__Retrieve  data from table and show in dashboard
    public function show()
    {
        Budget::latest()->where(['user_id'=>auth()->user()->id])->get();

    }


    public function addBudget(Request $request)
    {
        $validateData = $request->validate([
            'amount' => ['numeric', 'gte:0'],
        ]);
        $validateData['user_id'] = auth()->user()->id;
        Budget::create($validateData);
        return redirect('/dashboard')->with('message','Budget Added Successfully');
    }
}
