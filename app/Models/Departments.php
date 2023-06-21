<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'description', 'department_position', 'department_status', 'department_desc'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
