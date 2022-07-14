<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table='news';
    protected $guarded=[];

    // newsType
    public function newsType()
    {
        return $this->belongsTo(NewsType::class , 'type_id');
    }

    // branches
    public function branch()
    {
        return $this->belongsTo(Branch::class , 'branch_id');
    }
}
