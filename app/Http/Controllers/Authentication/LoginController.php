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
            if (auth()->user()->is_teacher) {
            } else {
                return redirect()->route('dashboard.index');
            }
        } else {
            return redirect()->back()->withInput()->with('failure', 'Your Credentials not match to our records.');
        }
    }
}
