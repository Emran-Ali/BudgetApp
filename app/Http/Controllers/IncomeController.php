<?php

namespace App\Http\Controllers;

use App\Enums\Finance;
use App\Models\Income;
use App\Models\IncomeExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incomeList = Income::latest()->where(['user_id'=>auth()->user()->id])->paginate(3);
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
        $validateData['user_id'] = auth()->user()->id;
        Income::create($validateData);
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
        $validateData = $request->validate([
            'field' => ['string', 'max:50'],
            'amount' => ['integer', 'gt:-1'],
        ]);
        Income::where('id',$id)->update($validateData); 
        return redirect('/incomes')->with('message','Income Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $list = Income::find($id);
        $list->delete();

        return redirect('/incomes')->with('message','Income Deleted Successfully');
    }

    public function filter(Request $request){
        
        $date = strtotime($request->date);
        if(!$date) {
            return back()->with('message','Please Select Month');
        }
        $month =  date('m', $date);
        $year =  date('Y', $date);
       
        $incomeList = Income::latest()->where(['user_id'=>auth()->user()->id])->whereMonth('created_at',$month)->whereYear('created_at',$year)->paginate(3);
        return view('components.income-list',['incomeList'=>$incomeList]);
    }
}
