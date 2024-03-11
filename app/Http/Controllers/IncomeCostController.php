<?php

namespace App\Http\Controllers;

use App\Models\Income_cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeCostController extends Controller
{
    public function show()
    {
        return view('components.dashboard',['data'=> Income_cost::where('User_id',auth()->user()->id)->first()]);
    }
    public function addIncome(Request $request)
    {
//        dd($request->all());
        $validateData = $request->validate([
            'field' => ['string', 'max:50'],
            'amount' => ['integer', 'gt:-1'],
        ]);
        $validateData['type']='income';
        $validateData['user_id'] = auth()->user()->id;
        Income_cost::create($validateData);

        return redirect('/dashboard')->with('message','Income Added Successfully');
    }
    public function addCost(Request $request)
    {
        $validateData = $request->validate([
            'field' => ['string', 'max:50'],
            'amount' => ['integer', 'gt:-1'],
        ]);
        $validateData['type']='cost';
        $validateData['user_id'] = auth()->user()->id;
        Income_cost::create($validateData);
        return redirect('/dashboard')->with('message','Cost Added Successfully');
    }
}
