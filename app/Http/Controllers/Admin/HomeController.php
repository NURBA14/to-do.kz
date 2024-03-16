<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use App\Models\Rank;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $done_tasks = Task::where("is_done", "=", 1)->where("active", "=", 1)->count();
        $in_process_tasks = Task::where("in_process", "=", 1)->where("active", "=", 1)->count();
        $not_done_tasks = Task::where("is_done", "=", 0)->where("active", "=", 1)->count();
        $not_active_tasks = Task::where("active", "=", 0)->count();
        $workers = User::where("is_worker", "=", 1)->count();
        $admins = User::where("is_admin", "=", 1)->count();
        $ban_workers = User::where("is_worker", "=", 1)->where("active", "=", 0)->count();
        $users = User::where("is_worker", "=", 0)->count();
        $teams = Team::count();
        $professions = Profession::count();
        $ranks = Rank::count();
        if ($done_tasks and $not_done_tasks and $done_tasks) {
            $progress = ($done_tasks / ($not_done_tasks + $done_tasks)) * 100;
        } else {
            $progress = null;
        }
        $best_teams = Team::withCount([
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
        $all_teams = Team::withCount([
            "tasks" => function ($query) {
                $query->where("is_done", "=", 1);
            }
        ])->orderBy("tasks_count", "DESC")->get();
        $all_teams_users = Team::withCount([
            "users" => function ($query) {
                $query->where("is_worker", "=", 1);
            }
        ])->orderBy("users_count", "DESC")->get();
        $progress_workers = ($workers / ($users + $workers + $ban_workers)) * 100;
        return view(
            "admin.home",
            compact(
                "done_tasks",
                "in_process_tasks",
                "not_done_tasks",
                "not_active_tasks",
                "workers",
                "admins",
                "ban_workers",
                "users",
                "teams",
                "professions",
                "ranks",
                "progress",
                "best_teams",
                "i",
                "color",
                "all_teams",
                "all_teams_users",
                "progress_workers"
            )
        );
    }
}
