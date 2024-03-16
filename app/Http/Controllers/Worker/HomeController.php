<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Spotify;
use App\Models\Task;
use App\Models\YouTube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $done_tasks = Task::where("team_id", "=", Auth::user()->team->id)->where("is_done", "=", 1)->where("active", "=", 1)->count();
        $in_process_tasks = Task::where("team_id", "=", Auth::user()->team->id)->where("in_process", "=", 1)->where("active", "=", 1)->count();
        $not_done_tasks = Task::where("team_id", "=", Auth::user()->team->id)->where("is_done", "=", 0)->where("active", "=", 1)->count();
        if ($done_tasks and $not_done_tasks and $done_tasks) {
            $progress = ($done_tasks / ($not_done_tasks + $done_tasks)) * 100;
        } else {
            $progress = 100;
        }
        $last_tasks = Task::where("team_id", "=", Auth::user()->team->id)->where("active", "=", 1)->where("is_done", "=", 0)->orderBy("deadline", "ASC")->limit(4)->get();
        $not_done_tasks = Task::where("team_id", "=", Auth::user()->team->id)->where("is_done", "=", 0)->count();
        return view("worker.index", compact("last_tasks", "not_done_tasks", "progress", "in_process_tasks", "done_tasks"));
    }
}
