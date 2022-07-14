<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table='tasks';
    protected $guarded=[];

    // function get admin
    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }

    // users
    public function users()
    {
        return $this->belongsToMany(User::class , 'task_users')->withPivot('rate', 'desc');
    }

    // function get branch
    public function branch()
    {
      return $this->belongsTo(Branch::class , 'branch_id');
    }

    // function get sections
    public function sections()
    {
        return $this->belongsToMany(Section::class , 'task_sections');
    }
}
