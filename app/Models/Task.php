<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "text", "team_id", "deadline", "active"
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }


    public function getIsDone()
    {
        if ($this->is_done == 1) {
            return true;
        } else {
            return false;
        }
    }


    public function getInProcess()
    {
        if ($this->in_process == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getActive()
    {
        if ($this->active == 1) {
            return true;
        } else {
            return false;
        }
    }
}
