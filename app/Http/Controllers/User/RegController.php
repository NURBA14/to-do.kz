<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegController extends Controller
{
    public function index()
    {
        return view("user.reg");
    }
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email|unique:users",
            "name" => "required|max:255|string",
            "password" => "required|confirmed"
        ]);
        $user = User::create([
            "email" => $request->email,
            "name" => $request->name,
            "password" => bcrypt($request->password)
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect()->route("guest.home");
    }
}
