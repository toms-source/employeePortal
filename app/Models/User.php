<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'employee_number',
        'last_name',
        'first_name',
        'middle_name',
        'department',
        'employee_status',
        'role',
        'gender',
        'birth_date',
        'civil_status',
        'number',
        'address',
        'sss',
        'tin',
        'philhealth',
        'pagibig',
        'contact_name',
        'contact_number',
        'contact_relationship',
        'position',
        'description',
        'salary_rate',
        'status',
        'start_date',
        'end_date',
        'profile_picture',
        'rememberToken',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function leave_requests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
}
