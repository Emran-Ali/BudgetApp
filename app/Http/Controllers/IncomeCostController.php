<?php

namespace App\Http\Controllers;

use App\Models\Income_cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeCostController extends Controller
{
    public function show()
    {
        $data = DB::table('income_costs')->where('user_id', 1)->first();

        return view('components.dashboard',['data'=> Income_cost::where('User_id',auth()->user()->id)->first()]);
    }
    public function addIncome(Request $request)
    {
//        dd($request->all());
        $validate = $request->validate([
            'salary' => ['integer', 'gt:-1'],
            'others' => ['integer', 'gt:-1'],
        ]);
        $total = $validate['salary'] + $validate['others'];
        DB::table('income_costs')->where('id','1')->incrementEach([
            'monthly_income'=> $total,
            'total_income'=> $total,
            ]);

        return redirect('/dashboard')->with('message','Income Added Successfully');
    }
    public function addCost(Request $request)
    {
        $validate = $request->validate([
            'accommodation' => ['integer', 'gt:-1'],
            'grocery' => ['integer', 'gt:-1'],
            'transportation' => ['integer', 'gt:-1'],
            'others' => ['integer', 'gt:-1'],
        ]);
        $total = $validate['accommodation'] + $validate['grocery'] + $validate['transportation' ]+ $validate['others'];
        DB::table('income_costs')->where('id','1')->incrementEach([
            'monthly_cost'=> $total,
            'total_cost'=> $total,
        ]);
        return redirect('/dashboard')->with('message','Cost Added Successfully');
    }
}
