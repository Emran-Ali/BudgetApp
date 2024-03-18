<?php

namespace App\Http\Controllers;


use App\Models\Expense;
use App\Models\IncomeExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costList = Expense::latest()->where(['user_id'=>auth()->user()->id])->paginate(4);

        return view('components.expense-list',['costList'=>$costList]);
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
        Expense::create($validateData);
        return redirect('/expenses')->with('message','Expense Added Successfully');
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
        Expense::where('id',$id)->update($validateData); 
        return redirect('/expenses')->with('message','Expense Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $list = Expense::find($id);
        $list->delete();
        return redirect('/expenses')->with('message','Expense deleted Successfully');
    }

    public function filter(Request $request){
        
        $date = strtotime($request->date);
        if(!$date) {
            return back()->with('message','Please Select Month');
        }
        $month =  date('m', $date);
        $year =  date('Y', $date);
       
        $expensesList = Expense::latest()->where(['user_id'=>auth()->user()->id])->whereMonth('created_at',$month)->whereYear('created_at',$year)->paginate(3);
        return view('components.expense-list',['costList'=>$expensesList]);

    }
}
