<?php

namespace App\Models;

use App\Models\WindDirection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WeatherCondition extends Model
{
    use HasFactory;
    protected $table = "weatherconditions";

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'weather_id');
    }
    public function precipitations()
    {
        return $this->belongsToMany(Precipitation::class);
    }

    public function windDirections()
    {
        return $this->belongsToMany(WindDirection::class);
    }
}
