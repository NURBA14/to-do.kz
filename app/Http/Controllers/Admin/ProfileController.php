<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\Rank;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $professions = Profession::pluck("name", "id");
        $ranks = Rank::pluck("name", "id");
        $teams = Team::pluck("name", "id");
        return view("admin.profile.index", compact("professions", "ranks", "teams"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255|string",
            "avatar" => "nullable|image",
            "profession_id" => "nullable|integer",
            "rank_id" => "nullable|integer",
            "team_id" => "nullable|integer"
        ]);
        $user = User::find(Auth::user()->id);
        if ($request->avatar) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $folder = date("Y-m-d");
            $avatar = $request->file("avatar")->store("avatar/{$folder}");
        } else {
            $avatar = $user->avatar;
        }
        $user->update([
            "name" => $request->name,
            "avatar" => $avatar,
            "profession_id" => $request->profession_id ?? $user->profession_id,
            "rank_id" => $request->rank_id ?? $user->rank_id,
            "team_id" => $request->team_id ?? $user->team_id,
            "is_worker" => 1
        ]);
        session()->flash("success", "Changes is saved");
        return redirect()->back();
    }


    public function destroy(Auth $user)
    {
        $user = User::find(Auth::user()->id);
        if ($user->avatar) {
            Storage::delete($user->avatar);
        }
        $user->avatar = null;
        $user->save();
        session()->flash("success", 'Avatar is deleted');
        return redirect()->back();
    }

}
