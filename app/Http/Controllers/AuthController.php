<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    /**
     * Show the login form
     */
    public function create()
    {
        return inertia('Auth/Login');
    }

    /**
     * release login logic
     */
    public function store(Request $request)
    {

        if(!Auth::attempt($request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]),true)){
            throw ValidationException::withMessages(['email' => 'Authentification failed']);
        }

        // создает новый id сессии сохраняя данные сессии (напр flesh mess, name, email)
        $request->session()->regenerate();

        return redirect()->intended('/listing');
    }


    /**
     * release logout
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        // полностью уничтожить сессию
        $request->session()->invalidate();

        // пересоздать токен https://laravel.su/docs/11.x/csrf
        $request->session()->regenerateToken();

        return redirect()->route('listing.index');
    }
}
