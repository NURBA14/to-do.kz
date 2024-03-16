<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyController extends Controller
{
    public function notice(Request $request)
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route("guest.home");
        }
        return view("user.verify.index");
    }

    public function send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        session()->flash("success", "Email is send");
        return redirect()->back();
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        session()->flash("success", "You verify email");
        return redirect()->route("guest.home");
    }
}
