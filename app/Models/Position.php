<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'position_name',
        'base_salary'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
