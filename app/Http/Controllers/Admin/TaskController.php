<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Team;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with("team")->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.task.index", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::pluck("name", 'id');
        return view("admin.task.create", compact("teams"));
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
            "name" => "required|max:255|string",
            "text" => "nullable|string",
            "deadline" => "required|date",
            "team_id" => "required|integer"
        ]);
        Task::create([
            "name" => $request->name,
            "text" => $request->text,
            "deadline" => $request->deadline,
            "team_id" => $request->team_id
        ]);
        session()->flash("success", "Task is saved");
        return redirect()->route("tasks.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view("admin.task.show", compact("task"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::with("team")->find($id);
        $teams = Team::pluck("name", 'id');
        return view("admin.task.edit", compact("task", "teams"));
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
            "name" => "required|max:255|string",
            "text" => "nullable|string",
            "deadline" => "required|date",
            "team_id" => "required|integer",
            "active" => "nullable"
        ]);
        if(isset($request->active)){
            $active = 1;
        }
        $task = Task::find($id);
        $task->update([
            "name" => $request->name,
            "text" => $request->text,
            "deadline" => $request->deadline,
            "team_id" => $request->team_id,
            "active" => $active ?? 0
        ]);
        session()->flash("success", "Task is saved");
        return redirect()->route("tasks.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        session()->flash("success", "{$task->name} is deleted");
        return redirect()->route("tasks.index");
    }
}
