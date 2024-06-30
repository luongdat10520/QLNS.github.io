<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;
    protected $fillable = [
        'benefit_name',
        'description',
        'benefit_type',
        'applicable_to'
    ];
}
