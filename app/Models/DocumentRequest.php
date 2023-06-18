<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'reason', 
        'status',
        'file_path'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
