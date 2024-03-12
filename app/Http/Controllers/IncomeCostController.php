<?php

namespace App\Http\Controllers;

use App\Models\IncomeCost;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeCostController extends Controller
{

    //__Retrieve  data from table and show in dashboard
    public function show(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $monthlyIncome = IncomeCost::where(['User_id'=>auth()->user()->id,'type'=> 1])->whereBetween('created_at',
            [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])->sum('amount');
        $monthlyBudget = IncomeCost::where(['User_id'=>auth()->user()->id,'type'=> 3])->whereBetween('created_at',
            [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])->sum('amount');
        $monthlyCost = IncomeCost::where(['User_id'=>auth()->user()->id,'type'=> 2])->whereBetween('created_at',
            [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])->sum('amount');
        return view('components.dashboard',['monthlyIncome'=>$monthlyIncome,'monthlyCost'=>$monthlyCost, 'monthlyBudget'=>$monthlyBudget]);
    }
    public function addIncome(Request $request)
    {
//        dd($request->all());
        $validateData = $request->validate([
            'field' => ['string', 'max:50'],
            'amount' => ['integer', 'gt:-1'],
        ]);
        $validateData['type']=1;
        $validateData['user_id'] = auth()->user()->id;
        IncomeCost::create($validateData);
        DB::table('users')->where('id',auth()->user()->id)->increment('total_income',$validateData['amount']);
        return redirect('/dashboard')->with('message','Income Added Successfully');
    }
    public function addCost(Request $request)
    {
        $validateData = $request->validate([
            'field' => ['string', 'max:50'],
            'amount' => ['integer', 'gt:-1'],
        ]);
        $validateData['type']=2;
        $validateData['user_id'] = auth()->user()->id;
        IncomeCost::create($validateData);
        DB::table('users')->where('id',auth()->user()->id)->increment('total_cost',$validateData['amount']);
        return redirect('/dashboard')->with('message','Expense Added Successfully');
    }
    public function addBudget(Request $request)
    {
        $validateData = $request->validate([
            'amount' => ['integer', 'gt:-1'],
        ]);
        $validateData['type']=3;
        $validateData['user_id'] = auth()->user()->id;
        IncomeCost::create($validateData);
        DB::table('users')->where('id',auth()->user()->id)->increment('total_cost',$validateData['amount']);
        return redirect('/dashboard')->with('message','Budget Added Successfully');
    }
}
