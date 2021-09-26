<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup()
    {
        return view ('pages.auth.signup');
    }
    
    public function register(Request $request)
    {   
        $validatedData = $request->validate([
        'name' => 'required|max:255',
        'username' => 'required|min:5|max:255|unique:users',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:8|max:10',
        'confirmPassword' =>'same:password'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        $request->session()->flash('success', 'Registration Successful');
        return redirect('/auth/sign-in');
    }

    public function signin()
    {
        return view ('pages.auth.signin');
    }
    
    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->with('loginError','Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}