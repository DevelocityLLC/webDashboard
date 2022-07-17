<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;

    protected $table='requirements';
    protected $guarded=[];

    // task
    public function task()
    {
        return $this->belongsTo(Task::class , 'task_id');
    }

    // admin
    public function admin()
    {
       return $this->belongsTo(Admin::class , 'admin_id');
    }

    // user
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
