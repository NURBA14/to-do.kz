<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class BanController extends Controller
{
    public function index()
    {
        $banned = User::with("profession", "rank", "team")->where("is_worker", "=", 1)->where("active", "=", 0)->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.ban.index", compact("banned"));
    }

    public function store($id)
    {
        $user = User::find($id);
        if ($user->active == 1) {
            $user->active = 0;
            $user->save();
            session()->flash("success", "{$user->name} is banned");
            return redirect()->back();
        } else {
            $user->active = 1;
            $user->save();
            session()->flash("success", "{$user->name} is unbanned");
            return redirect()->back();
        }
    }
}
