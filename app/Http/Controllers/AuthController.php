<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
   
    /**
     * View home page
     ***********************************/
    public function viewMessage()
    {
        $userData = Auth::user();
        return view('message.home', compact('userData'));
    }

    /**
     * Login process
     ***************************/
    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('home.page');
        } else {
            return redirect()->route('login')->withErrors('Invalid credentials');
        }
    }

    /**
     * Register process
     ***************************/
    public function registerProcess(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'username' => 'required',
            'password' => 'required',
            'comform_password' => 'required',
        ]);

        User::create([
            'firstname' => $request->firstname,
            'username' => $request->username,
            'password' => \Hash::make($request->password),
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            return redirect()->route('home.page');
        } else {
            return redirect()->route('sign.up')->withErrors('Registration error');
        }
    }

    /**
     * Logout
     ***************************/
    public function logout()
    {
        \Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
