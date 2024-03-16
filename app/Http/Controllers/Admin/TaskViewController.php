<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskViewController extends Controller
{
    public function done()
    {
        $tasks = Task::with("team")->where("is_done", "=", 1)->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.task.done", compact("tasks"));
    }


    public function notActive()
    {
        $tasks = Task::with("team")->where("active", "=", 0)->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.task.notactive", compact("tasks"));
    }

    public function setActive($id)
    {
        $task = Task::find($id);
        if ($task->active == 1) {
            $task->active = 0;
            $task->save();
            session()->flash("success", "Task is not active");
            return redirect()->back();
        } else {
            $task->active = 1;
            $task->save();
            session()->flash("success", "Task is active");
            return redirect()->back();
        }
    }

    public function inProcess()
    {
        $tasks = Task::with("team")->where("in_process", "=", 1)->orderBy("created_at", "DESC")->paginate(10);
        return view("admin.task.inprocess", compact("tasks"));
    }

    public function truncate()
    {
        Task::query()->truncate();
        session()->flash("success", "Tasks table is clean");
        return redirect()->back();
    }
}
