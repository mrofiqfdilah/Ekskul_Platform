<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
{
    Auth::logout(); // Melakukan logout pengguna

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login'); // Redirect ke halaman login setelah logout
}
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('eskul.index');
            } elseif (auth()->user()->is_guru == 1) {
                return redirect()->route('listmurid.index'); // Ganti dengan rute guru yang sesuai
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email/kata sandi salah.');
        }
    }
    
}