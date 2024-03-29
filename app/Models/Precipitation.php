<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precipitation extends Model
{
    use HasFactory;

    public function weatherConditions()
{
    return $this->belongsToMany(WeatherCondition::class);
}
}
