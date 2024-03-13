<?php

namespace App\Http\Controllers;

use App\Models\IncomeCost;
use App\Models\User;
use App\Models\Income_cost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
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

    /**
     * Show the form for creating a new resource.
     */
    public function login():View
    {
        return view('layouts.login');
    }
    //log in user
    public function authenticate(Request $request)
    {
        $formField = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        if(auth()->attempt($formField)){
            $request->session()->regenerate();
            return redirect('/dashboard')->with('message','You are now Logged In!');
        }
        return back()->withErrors(['email'=>'Invalid Credential'])->onlyInput('email');

    }

//    Log out user
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function create()
    {
        return view('layouts.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'numeric','regex:/(^(\+8801|8801|01|008801))[1|3-9]{1}(\d){8}$/'],
            'occupation' => ['required','string'],//occupation
            'address' => ['required','string'], //address
            'password' => ['required', 'min:5', 'confirmed'],
        ]);
        $validate['password'] = bcrypt($validate['password']);
        dd($validate);
        $user = User::create($validate);

        auth()->login($user);
        return redirect('/dashboard')->with('message','User Created and Login Successfully ');
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
        //
    }
}
