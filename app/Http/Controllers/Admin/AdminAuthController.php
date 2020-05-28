<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        # get fields from request
        $credentials = $request->only('email', 'password');
        $shouldRemember = $request->get('rememberme', false);
        # find user
        $user = User::where('email', $credentials['email'])->first();
//        dd($user->hasRole('member'));
        if ($user) {
            # login user
            if (Auth::attempt($credentials, $shouldRemember) && ($user->hasRole('admin') || $user->hasRole('super-admin') || $user->hasRole('developer')) ) {
                # redirect to home page
                return redirect('home');
            } else {
                Auth::logout();
                return redirect('login')->withErrors(['msg' => 'Email or Password is incorrect']);
            }
        }
        return redirect('login')->withErrors(['msg' => 'Email or Password is incorrect']);
    }
}
