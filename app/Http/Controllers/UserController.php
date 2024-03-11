<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Income_cost;
use Illuminate\Http\Request;
use Illuminate\View\View;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        return view('layouts.greating');
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
            'phone' => ['required', 'numeric'],
            'occupation' => ['required','string'],
            'address' => ['required','string'],
            'password' => ['required', 'min:5', 'confirmed'],
        ]);
        $validate['password'] = bcrypt($validate['password']);
        $user = User::create($validate);

         Income_cost::create([
            'user_id' => $user->id,
            'name' => $user->name,
        ]);
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
