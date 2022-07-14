<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table='sections';
    protected $guarded=[];

    // function get branch

    public function branch()
    {
        return $this->belongsTo(Branch::class , 'branch_id');
    }

     // function get tasks
     public function sections()
     {
         return $this->belongsToMany(Task::class , 'task_sections');
     }
}
