<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("user.login");
    }
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
            "remember_me" => "nullable"
        ]);
        if (isset ($request->remember_me)) {
            $remember_me = true;
        } else {
            $remember_me = false;
        }
        if (Auth::attempt(["email" => $request->email, "password" => $request->password], $remember_me)) {
            session()->flash("success", "You are logged");
            if (Auth::user()->active == 0) {
                return redirect()->route("guest.home");
            } elseif (Auth::user()->is_admin == 1) {
                return redirect()->route("admin.home");
            } elseif (Auth::user()->is_worker == 1) {
                return redirect()->route("worker.home");
            } else {
                return redirect()->route("guest.home");
            }
        }
        session()->flash("error", "Incorrect email or password");
        return redirect()->route("login.index");
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route("login.index");
    }
}
