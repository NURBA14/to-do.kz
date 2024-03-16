<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function index()
    {
        $teams = Team::withCount([
            "tasks" => function ($query) {
                $query->where("is_done", "=", 1)->where("active", "=", 1);
            }
        ])->orderBy("tasks_count", "DESC")->limit(3)->get();
        $i = 1;
        $color = [
            1 => "success",
            2 => "warning",
            3 => "danger"
        ];
        $unfulfilled_tasks = Task::where("is_done", "=", 0)->where("active", "=", 1)->where("team_id", "=", Auth::user()->team_id)->count();
        $done_tasks = Task::where("is_done", "=", 1)->where("active", "=", 1)->where("team_id", "=", Auth::user()->team_id)->count();
        $tasks = Task::where("team_id", "=", Auth::user()->team_id)->where("active", "=", 1)->count();
        $deadline = Task::where("is_done", "=", 0)->where("active", "=", 1)->where("team_id", "=", Auth::user()->team_id)->orderBy("deadline", "ASC")->limit(1)->first("deadline");
        return view("worker.statistic.index", compact("teams", "i", "color", "unfulfilled_tasks", "done_tasks", "deadline", "tasks"));
    }
}
