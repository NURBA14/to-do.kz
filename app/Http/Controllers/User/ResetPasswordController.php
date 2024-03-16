<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view("user.fargot-pass");
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email"
        ]);
        $status = Password::sendResetLink([
            "email" => $request->email
        ]);
        if ($status === Password::RESET_LINK_SENT) {
            session()->flash("success", trans($status));
            return redirect()->back();
        }
        session()->flash("error", trans($status));
        return redirect()->back();
    }

    public function reset(Request $request)
    {
        return view("user.reset.index", compact("request"));
    }


    public function update(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "token" => "required",
            "password" => "required|confirmed"
        ]);
        $status = Password::reset([
            "email" => $request->email,
            "password" => $request->password,
            "password_confirmation" => $request->password_confirmation,
            "token" => $request->token
        ], function ($user) use ($request) {
            $user->forceFill([
                "password" => bcrypt($request->password),
                "remember_token" => Str::random(16)
            ])->save();
        });
        if ($status === Password::PASSWORD_RESET) {
            session()->flash("success", trans($status));
            return redirect()->route("login.index");
        }
        session()->flash("error", trans($status));
        return redirect()->back();
    }
}
