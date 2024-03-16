<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions = Profession::withCount("users")->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.profession.index", compact("professions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.profession.create");
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
        Profession::create([
            "name" => $request->name
        ]);
        session()->flash("success", "Profession is saved");
        return redirect()->route("professions.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::with("team", "rank")->where("profession_id", "=", $id)->get();
        $profession = Profession::find($id);
        return view("admin.profession.show", compact("users", "profession"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profession = Profession::find($id);
        return view("admin.profession.edit", compact("profession"));
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
        $profession = Profession::find($id);
        $profession->update([
            "name" => $request->name
        ]);
        session()->flash("success", "{$request->name} is saved");
        return redirect()->route("professions.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profession = Profession::find($id);
        if ($profession->users) {
            session()->flash("error", "Profession has workers");
            return redirect()->route("professions.index");
        }
        $profession->delete();
        session()->flash("success", "Profession is deleted");
        return redirect()->route("professions.index");
    }
}
