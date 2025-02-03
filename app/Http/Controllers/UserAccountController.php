<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{

    /**
     * Show the register form
     */
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        // NB!
        // '..|unique:users',  поле уникальное в таблице users
        // '..|confirmed       подтверждено полем их формы с постфиксом _сonfirmed
        // напр.  password   password_confirmed
        $user = User::make($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]));

        $user->save();

        Auth::login($user);

        return redirect()->route('listing.index')->with('success','Account registered');
    }


}
