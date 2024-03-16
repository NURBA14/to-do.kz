<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::withCount("users")->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.team.index", compact("teams"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.team.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255|string"
        ]);
        Team::create([
            "name" => $request->name
        ]);
        session()->flash("success", "Team is saved");
        return redirect()->route("teams.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::with("profession", "rank")->where("team_id", "=", $id)->get();
        $team = Team::find($id);
        return view("admin.team.show", compact("users", "team"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view("admin.team.edit", compact("team"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:255|string"
        ]);
        $team = Team::find($id);
        $team->update([
            "name" => $request->name
        ]);
        session()->flash("success", "{$team->name} is saved");
        return redirect()->route("teams.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        if ($team->users->count()) {
            session()->flash("error", "{$team->name} has workers");
            return redirect()->route("teams.index");
        }
        $team->delete();
        session()->flash("success", "{$team->name} was deleted");
        return redirect()->route("teams.index");
    }
}
