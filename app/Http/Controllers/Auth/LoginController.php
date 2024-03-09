<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthUserRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email' => $email, 'password' => $password];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(true);
            return to_route('home')->with('success', 'Vous êtes bien connecté ' . $email . ".");
        } else {
            return back()->withErrors([
                'email' => 'Email ou mot de passe incorrect.'
            ])->onlyInput('email');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
