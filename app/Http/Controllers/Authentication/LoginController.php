<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('authentication.index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:30',
            'password' => 'required|max:30',
        ]);
        $credentials = $request->except('_token');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withInput()->with('failure', 'Your Credentials not match to our records.');
        }
    }

    public function logout()
    {
        Auth::logout(auth()->user());

        return redirect()->route('authentication.index');
    }
}
