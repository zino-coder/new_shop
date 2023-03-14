<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (!Auth::guard('admin')->attempt($credentials)) {
            return back()->withErrors([
                'login' => 'Wrong username or password!',
            ])->onlyInput('email');
        }

        Auth::guard('admin')->attempt($credentials);
        $user = Auth::guard('admin')->user();

        if ($user->status == false) {
            return back()->withErrors([
                'login' => 'Your account is not active',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->route('admin.home')->with('success', 'Login Successfully!');
    }
}
