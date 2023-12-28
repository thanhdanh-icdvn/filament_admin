<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('pages.login.index');
    }

    /**
     * Handle account login request
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->credentials();

        if (Auth::guard('customer')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        return back()->with([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }
}
