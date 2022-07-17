<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='users';
    protected $guarded=[];
    protected $appends = ['user_type'];

    // function get branch
    public function branch()
    {
        return $this->belongsTo(Branch::class , 'branch_id');
    }

    // function get branch
    public function sections()
    {
        return $this->belongsTo(Section::class , 'section_id');
    }

    // tasks
    public function tasks()
    {
        return $this->belongsToMany(Task::class , 'task_users')->withPivot('rate', 'desc');
    }


    // avg_rate

    public function avg_rates()
    {
        $tasks_rated = $this->tasks->where('pivot.rate', '!=',null)->count();

        if($tasks_rated)
            return $this->tasks->sum('pivot.rate') / $tasks_rated;

    }




    public function getUserTypeAttribute()
    {
        return 'users';
    }



















    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
