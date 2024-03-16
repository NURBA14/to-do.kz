<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\Rank;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $professions = Profession::pluck("name", "id");
        $teams = Team::pluck("name", "id");
        $ranks = Rank::pluck("name", "id");
        $users = User::where("is_admin", "=", 0)->where("is_worker", "=", 0)->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.user.index", compact("users", "professions", "teams", "ranks"));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            "profession_id" => "required|integer",
            "rank_id" => "required|integer",
            "team_id" => "required|integer"
        ]);
        $user = User::find($id);
        $user->update([
            "profession_id" => $request->profession_id,
            "rank_id" => $request->rank_id,
            "team_id" => $request->team_id,
            "is_worker" => 1
        ]);
        session()->flash("success", "{$user->name} is new worker");
        return redirect()->route("users.index");
    }
}
