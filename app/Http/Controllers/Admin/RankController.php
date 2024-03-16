<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rank;
use App\Models\User;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranks = Rank::withCount("users")->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.rank.index", compact("ranks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.rank.create");
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
        Rank::create([
            "name" => $request->name
        ]);
        session()->flash("success", "Rank is saved");
        return redirect()->route("ranks.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::with("profession", "team")->where("rank_id", "=", $id)->get();
        $rank = Rank::find($id);
        return view("admin.rank.show", compact("users", "rank"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rank = Rank::find($id);
        return view("admin.rank.edit", compact("rank"));
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
        $rank = Rank::find($id);
        $rank->update([
            "name" => $request->name
        ]);
        session()->flash("success", "Rank {$rank->name} is saved");
        return redirect()->route("ranks.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rank = Rank::find($id);
        if($rank->users->count()){
            session()->flash("error", "{$rank->name} has workers");
            return redirect()->route("ranks.index");
        }
        $rank->delete();
        session()->flash("success", "{$rank->name} was deleted");
        return redirect()->route("ranks.index");
    }
}
