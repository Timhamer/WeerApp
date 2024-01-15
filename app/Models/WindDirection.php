<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WindDirection extends Model
{
    use HasFactory;

    public function weatherConditions()
{
    return $this->belongsToMany(WeatherCondition::class);
}
}
