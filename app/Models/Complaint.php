<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $table='complaints';
    protected $guarded=[];

    // tasks
    public function task()
    {
        return $this->belongsTo(Task::class , 'task_id');
    }

    // users
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

}
