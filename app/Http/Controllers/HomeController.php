<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{
    //

    public function homepage(Request $request) {
        return view('home');
    }

    public function loginpage(Request $request) {
        return view('login');
    }

    public function loginpagepost(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|bail',
            'password' => 'required|min:8',
        ],[
            'email.required' => "Email obligatoire",
            'email.email' => "Email incorrect",
            'password.min' => "Le mot de passe doit contenir au moins 8 caractères",
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('customerhome');
        }

        $user = User::find($request->email);

        if(!$user || !count($user)) return redirect()->back()->withErrors(['msg'=>'Mail ou mot de passe incorrect']);

    }

    public function registerpagepost(Request $request) {

        $request->validate([
            'email' => 'required|unique:users|email|bail',
            'password' => 'required|min:8',
        ],[
            'email.unique' => "Cet utilisateur existe déjà",
            'email.required' => "Email obligatoire",
            'email.email' => "Email incorrect",
            'password.min' => "Le mot de passe doit contenir au moins 8 caractères",
        ]);


        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('customerhome')
        ->withSuccess('Connexion réussi avec succès');
    }

    public function registerpage(Request $request) {
        return view('register');
    }

    public function forgetpage(Request $request) {
        return view('forget');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginpage')->withSuccess('Déconnexion réussi');;
    }
}
