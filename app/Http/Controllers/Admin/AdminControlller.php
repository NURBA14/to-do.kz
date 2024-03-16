<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminControlller extends Controller
{
    public function index()
    {
        $admins = User::with("profession", "team", "rank")->where("is_admin", "=", 1)->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.admin.index", compact("admins"));
    }

    public function store($id)
    {
        $user = User::find($id);
        if ($user->is_admin == 1) {
            $user->is_admin = 0;
            $user->save();
            session()->flash("success", "{$user->name} is not admin");
            return redirect()->back();
        } else {
            $user->is_admin = 1;
            $user->save();
            session()->flash("success", "{$user->name} is admin");
            return redirect()->back();
        }
    }
}
