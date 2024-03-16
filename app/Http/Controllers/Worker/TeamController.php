<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::find(Auth::user()->team->id)->users()->with("profession", "rank")->orderBy("created_at", "DESC")->paginate(5);
        return view("worker.team.index", compact("team"));
    }
}
