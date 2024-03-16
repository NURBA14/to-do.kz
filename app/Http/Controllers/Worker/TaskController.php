<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where("team_id", "=", Auth::user()->team->id)->where("active", "=", 1)->where("in_process", "=", 0)->where("is_done", "=", 0)->orderBy("created_at", "DESC")->paginate(10);
        return view("worker.task.index", compact("tasks"));
    }

    public function is_done()
    {
        $tasks = Task::where("team_id", "=", Auth::user()->team->id)->where("active", "=", 1)->where("is_done", "=", 1)->orderBy("created_at", "DESC")->paginate(10);
        return view("worker.task.done", compact("tasks"));
    }

    public function in_process()
    {
        $tasks = Task::where("team_id", "=", Auth::user()->team->id)->where("active", "=", 1)->where("in_process", "=", 1)->orderBy("created_at", "DESC")->paginate(10);
        return view("worker.task.process", compact("tasks"));
    }

    public function show($id)
    {
        dd($id);
    }

    public function setInProcess($id)
    {
        $task = Task::findOrFail($id);
        if ($task->in_process == 1) {
            $task->in_process = 0;
            $task->save();
            session()->flash("success", "Task not in process");
            return redirect()->back();
        } else {
            $task->in_process = 1;
            $task->is_done = 0;
            $task->save();
            session()->flash("success", "Task in process");
            return redirect()->back();
        }
    }

    public function setIsDone($id)
    {
        $task = Task::findOrFail($id);
        if ($task->is_done == 1) {
            $task->is_done = 0;
            $task->save();
            session()->flash("sucess", "Task is not done");
            return redirect()->back();
        } else {
            $task->is_done = 1;
            $task->in_process = 0;
            $task->save();
            session()->flash("success", "Task is done");
            return redirect()->back();
        }
    }
}
