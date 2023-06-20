<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payrollList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cutoff_from',
        'cutoff_to',
        'present_days_total',
        'regular_hours_total',
        'gross_pay',
        'deductions',
        'allowance',
        'net_pay',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
