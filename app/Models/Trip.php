<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'user_id',
        'destination',
        'travel_date',
        'days',
        'people',
        'budget',
        'category',
        'ai_plan',
    ];
}