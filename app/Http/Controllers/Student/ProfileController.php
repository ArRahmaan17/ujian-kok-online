<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function update(Request $request)
    {
        if (isset($request->developer)) {
            $request->validate(['username' => 'required']);
        } else {
            $request->validate(['username' => 'required', 'full_name' => 'required', 'phone_numbers' => 'required']);
        }
        if ($request->exists('username')) {
            $user = ['username' => $request->username, 'updated_at' => now('Asia/Jakarta')];
        }
        $detail_users = [];
        if ($request->exists('full_name') && '' != $request->full_name) {
            $detail_users = ['full_name' => $request->full_name, 'phone_numbers' => $request->phone_numbers, 'updated_at' => now('Asia/Jakarta')];
        }
        DB::beginTransaction();
        try {
            User::profile_update([$user, $detail_users]);
            $user = auth()->user();
            Log::insert(['name' => 'action update profile', 'type' => 'success', 'user_id' => $user->id, 'description' => $user->username . ' has been update profile', 'created_at' => now('Asia/Jakarta')]);
            DB::commit();

            return redirect()->route('profile')->with(['message' => 'Success updating your profile', 'type' => 'success']);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::insert(['name' => 'action update profile', 'type' => 'failed', 'user_id' => $user->id, 'description' => $user->username . ' try to update profile', 'created_at' => now('Asia/Jakarta')]);

            return redirect()->route('profile.edit', auth()->user()->id)->with(['message' => 'Failed to update your profile', 'type' => 'error']);
        }
    }
    public function requestChangePassword($username, Request $request)
    {
        $user = User::getUserByUsername($username);
        if (collect($user)->isNotEmpty() && DB::table('request_change_password')->where('username', $user->username)->count() == 0) {
            DB::table('request_change_password')->insert([
                'username' => $user->username,
                'user_id' => $user->id,
                'reason' => $request->reason ?? 'did not include reasons',
                'created_at' => now('Asia/Jakarta'),
            ]);
            Log::insert(['name' => 'action request change password', 'type' => 'success', 'user_id' => $user->id, 'description' => $user->username . ' requesting to change user password', 'created_at' => now('Asia/Jakarta')]);
        } else if (collect($user)->isNotEmpty() && DB::table('request_change_password')->where('username', $user->username)->count() == 1) {
            Log::insert(['name' => 'action request change password', 'type' => 'success', 'user_id' => $user->id, 'description' => $user->username . ' requesting to change user password', 'created_at' => now('Asia/Jakarta')]);
        } else {
            return redirect()->route('profile')->with(['message' => 'Your Request Canceled! Because Username ' . $username . ' is Invalid', 'type' => 'error']);
        }
        return view('pages.wait', compact('username'));
    }
}
