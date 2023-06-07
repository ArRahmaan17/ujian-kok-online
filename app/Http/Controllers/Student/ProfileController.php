<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::with('detail_users')->find(auth()->user()->id);

        return view('pages.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = User::with('detail_users')->find(auth()->user()->id);

        return view('pages.profile.edit', compact('user'));
    }
}
