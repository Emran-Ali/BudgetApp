<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\incomeCost;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'numeric'],
            'occupation' => ['string', 'required'],
            'address' => ['string', 'required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
//TODO :

//       $userId =  DB::table('users')->insertGetId(
//
//            [ 'name' => $request->name,
//                'email' => $request->email,
//                'phone' => $request-> phone,
//                'occupation' => $request->occupation,
//                'address' => $request->address,
//                'password' => Hash::make($request->password)]);
//dd($request->all());
        //TODO: mass assignment
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request-> phone,
            'occupation' => $request->occupation,
            'address' => $request->address,
            'password' => Hash::make($request->password)
        ]);

        $expense =incomeCost ::create([ 'name' => $request->name, 'user_id' => $user->id]);

//        DB::table('income_costs')->insert(
//            [ 'name' => $request->name,
//                'user_id' => $user->id],
//        );
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
