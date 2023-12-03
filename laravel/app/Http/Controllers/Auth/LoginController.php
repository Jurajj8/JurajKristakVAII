<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Ak autentifikácia prebehla úspešne, presmerujte používateľa na určenú stránku
            return redirect()->intended($this->redirectPath());
        }

        // Ak autentifikácia zlyhala, presmerujte používateľa späť na prihlasovaciu stránku s chybou
        return redirect()->back()->withErrors(['email' => 'Nesprávne prihlasovacie údaje'])->withInput();
    }
    
    // Pridajte túto metódu, ak chcete umožniť používateľovi odhlásenie
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
