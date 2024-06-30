<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'date_of_birth',
        'address',
        'phone_number',
        'department_id',
        'position_id',
        'role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class, 'user_id', 'user_id');
    }
}
