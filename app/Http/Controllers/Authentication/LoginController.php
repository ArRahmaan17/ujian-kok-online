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
            'name' => 'required|min:8|max:30',
            'password' => 'required|min:8|max:30',
        ]);
        $credentials = $request->except('_token');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->back();
        };
    }
}
