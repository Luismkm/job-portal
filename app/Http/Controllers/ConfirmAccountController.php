<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ConfirmAccountController extends Controller
{
    public function confirmAccount($token)
    {
        $user = User::where('token', $token)->first();

        if (!$user) {
            abort(403, 'Invalid access token');
        }

        return view('auth.confirm-account', compact('user'));
    }

    public function confirmAccountSubmit(Request $request)
    {
        $request->validate([
            'token' => 'required|string|size:60',
            'password' => 'required|confirmed|min:8|max:16'
        ]);

        $user = User::where('token', $request->token);

        $user->update([
            'password' => $user->password = bcrypt($request->password),
            'token' => $user->token = null,
            'email_verified_at' => $user->email_verified_at = now(),
        ]);

        return redirect()->route('login');
    }
}
