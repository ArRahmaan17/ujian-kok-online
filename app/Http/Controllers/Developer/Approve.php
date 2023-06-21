<?php

namespace App\Http\Controllers\Developer;

use App\Http\Controllers\Controller;
use App\Models\RequestChangePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Approve extends Controller
{
    public function password()
    {
        $usersRequested = RequestChangePassword::where('approved', false)->get();
        return view('pages.developer.approve.changePassword.index', compact('usersRequested'));
    }

    public function processChangePassword($id)
    {
        $approval_user = User::find(auth()->user()->id);
        $requested_user = User::find($id);
        if (RequestChangePassword::where('user_id', $id)->count() > 0) {
            if ($approval_user->is_teacher || $approval_user->is_developer) {
                DB::beginTransaction();
                try {
                    RequestChangePassword::where('user_id', $id)->update([
                        'approval_id' => $approval_user->id,
                        'approved' => true,
                        'token' => Hash::make($approval_user->username),
                        'updated_at' => now('Asia/Jakarta'),
                    ]);
                    DB::commit();
                    return redirect()->route('support.replace-password')->with(['success' => ['message' => "Successfully Give Your Token To Change/Reset &nbsp;<i>" . $requested_user->username . "</i>&nbsp; Password"]]);
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            } else {
                return redirect()->route('dashboard')->with(['denied' => ['message' => "You Don't Have Permission To Access Replace Password Page Or The Page Is Under Maintenance"]]);
            }
        } else {
            return redirect()->route('support.replace-password')->with(['invalid' => ['message' => "Hey &nbsp;<b>" . $approval_user->username . "</b>&nbsp; You Can't Give Your Token to Invalid User!"]]);
        }
    }
    public function processResetPassword($id, Request $request)
    {
        dd($id, $request);
    }
}
