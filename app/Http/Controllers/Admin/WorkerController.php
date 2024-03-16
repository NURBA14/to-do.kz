<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = User::with("team", "profession", "rank")->where("is_worker", "=", 1)->where("is_admin", "=", 0)->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.worker.index", compact("workers"));
    }

    public function store($id)
    {
        $user = User::find($id);
        if ($user->is_worker == 1) {
            $user->is_worker = 0;
            $user->active = 1;
            $user->team_id = 0;
            $user->is_admin = 0;
            $user->profession_id = 0;
            $user->rank_id = 0;
            $user->save();
            session()->flash("success", "{$user->name} is not worker");
            return redirect()->back();
        } else {
            $user->is_worker = 1;
            $user->save();
            session()->flash("success", "{$user->name} is worker");
            return redirect()->back();
        }
    }
}
