<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    // public function salaries()
    // {
    //     return $this->hasMany(Salary::class);
    // }

    // public function workStatistics()
    // {
    //     return $this->hasMany(WorkStatistic::class);
    // }

    public function info()
    {
        return $this->hasOne(UserInfo::class);
    }
}
