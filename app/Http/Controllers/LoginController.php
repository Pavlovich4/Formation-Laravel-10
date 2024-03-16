<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where([
            'email' => $request->email
        ])->first();


        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            return redirect()->intended('dashboard');
        }

        /*if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }*/

        return back()->withErrors([
            'email' => 'Les identifiants de connexion fournis ne sont pas bon'
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('alert', [
            'type' => 'success',
            'message' => 'Deconnexion effectuée avec succès'
        ]);

    }
}
