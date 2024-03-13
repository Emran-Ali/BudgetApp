<?php

namespace App\Http\Controllers;

use App\Enums\Finance;
use App\Models\IncomeCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{

    //__Retrieve  data from table and show in dashboard
    public function show()
    {
        IncomeCost::where(['user_id'=>auth()->user()->id,'type'=>Finance::BUDGET])->get();

    }


    public function addBudget(Request $request)
    {
        $validateData = $request->validate([
            'amount' => ['integer', 'gt:-1'],
        ]);
        $validateData['type']=Finance::BUDGET;
        $validateData['user_id'] = auth()->user()->id;
        IncomeCost::create($validateData);
        DB::table('users')->where('id',auth()->user()->id)->increment('total_cost',$validateData['amount']);
        return redirect('/dashboard')->with('message','Budget Added Successfully');
    }
}
