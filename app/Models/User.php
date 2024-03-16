<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "profession_id",
        "rank_id",
        "team_id",
        "is_worker",
        "is_admin",
        "avatar",
        "active"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function getAdmin()
    {
        if ($this->is_admin == 1) {
            return true;
        } else {
            return false;
        }
    }


    public function getBan()
    {
        if ($this->active == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getWorker()
    {
        if ($this->is_worker == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getAvatar()
    {
        if ($this->avatar) {
            return "storage/{$this->avatar}";
        } else {
            return "storage/avatar/default/default.jpg";
        }
    }
}
