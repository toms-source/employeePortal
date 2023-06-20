<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class salaryTypes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'daily_rate',
        'hourly_rate',
        'tax_bir',
        'tax_sss',
        'tax_phealth',
        'tax_pibig',
        'ot_rate',
        'allowance'
    ];
}
