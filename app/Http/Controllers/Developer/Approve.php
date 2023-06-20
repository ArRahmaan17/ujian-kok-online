<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Approve extends Controller
{
    public function password()
    {
        $usersRequested = DB::table('request_change_password')->where('approved', false)->get();
        return view('pages.developer.approve.changePassword.index', compact('usersRequested'));
    }
}
