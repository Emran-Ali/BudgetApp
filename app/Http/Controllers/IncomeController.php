<?php

namespace App\Http\Controllers;

use App\Enums\Finance;
use App\Models\IncomeCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomeList = IncomeCost::where(['user_id'=>auth()->user()->id, 'type'=>Finance::INCOME])->paginate(3);
        return view('components.income-list',['incomeList'=>$incomeList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'field' => ['string', 'max:50'],
            'amount' => ['integer', 'gt:-1'],
        ]);
        $validateData['type']=Finance::INCOME;
        $validateData['user_id'] = auth()->user()->id;
        IncomeCost::create($validateData);
        DB::table('users')->where('id',auth()->user()->id)->increment('total_income',$validateData['amount']);
        return redirect('/incomes')->with('message','Income Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $list = IncomeCost::find($id);
        DB::table('users')->where('id',auth()->user()->id)->decrement('total_income',$list['amount']);
        $list->delete();

        return redirect('/incomes')->with('message','Income Deleted Successfully');
    }
}
