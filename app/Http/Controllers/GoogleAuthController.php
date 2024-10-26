<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    /**
     * 
     * google login 
     * 
     *--------------------------------*/
    function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * 
     * google call back  
     * 
     *--------------------------------*/
    function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->stateless()->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if(!$user)
            {
                
                $newUser = User::create([
                    'firstname' => $google_user->getName(),
                    'username' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),

                ]);
                 Auth::login($newUser);
                 return redirect()->route('add.blog.view');
                
            }else{
                Auth::login($user);
                return redirect()->route('add.blog.view');
            }
        } catch(\throwable $e) {
            
dd('somthing wents wrong'. $e->getMessage());
        }
    }

    /**
     * 
     * github login 
     * 
     *--------------------------------*/
    function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }


        /**
     * 
     * github callback 
     * 
     *--------------------------------*/
    function callbackgithub()
    {
        try {
            $github_user = Socialite::driver('github')->stateless()->user();

            $user = User::where('github_id', $github_user->getId())->first();

            if(!$user)
            {
                $newUser = User::create([
                    'firstname' => $github_user->attributes['name'] ?? $github_user->attributes['nickname'],
                    'username' => $github_user->attributes['email'],
                    'github_id' => $github_user->attributes['id'],

                ]);
                 Auth::login($newUser);
                 return redirect()->route('add.blog.view');
                
            }else{
                Auth::login($user);
                return redirect()->route('add.blog.view');
            }
        } catch(\throwable $e) {
            
dd('somthing wents wrong'. $e->getMessage());
        }
    }
}
