<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Repetition;
use Illuminate\Http\Request;
use App\Models\WeatherCondition;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Send the precipitations and wind directions to the view
        $precipitations = DB::table('precipitations')->get();
        $windDirections = DB::table('winddirection')->get();

        //compact the precipitations and wind directions and send them to the view
        return view('activitixes.create', compact('precipitations', 'windDirections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $existingName = Activity::where('name', $request->name)->first();

        if ($existingName) {
        } else {
            //Create a row in the weatherconditions table
            $weatherCondition = new WeatherCondition();
            $weatherCondition->temperature_min = $request->temperature_min;
            $weatherCondition->temperature_max = $request->temperature_max;
            $weatherCondition->cloudiness = $request->cloudiness;
            $weatherCondition->wind_speed = $request->wind;
            $weatherCondition->save();

            $precipitations = $request->selected_precipitations;

            // Convert the string into an array
            $precipitationArray = explode(',', $precipitations);

            // Loop through the array and get the ID of each precipitation
            foreach ($precipitationArray as $precipitation) {
                $precipitationId = DB::table('precipitations')->where('type', $precipitation)->value('id');
                // put the weathercondition id and the precipitation id in the pivot table
                $weatherCondition->precipitations()->attach($precipitationId);
            }

            $windDirections  = $request->selected_wind_directions;

            // Convert the string into an array
            $windDirectionsArray = explode(',', $windDirections);

            // Loop through the array and get the ID of each precipitation
            foreach ($windDirectionsArray as $windDirection) {
                $windDirectionId = DB::table('winddirection')->where('direciton', $windDirection)->value('id');
                // put the weathercondition id and the precipitation id in the pivot table
                $weatherCondition->windDirections()->attach($windDirectionId);
            }

           

            $existingName = new Activity();
            $existingName->user_id = auth()->user()->id;
            $existingName->name = $request->name;
            $existingName->duration = $request->duration;
            $existingName->location = $request->location;
            $existingName->weather_id = $weatherCondition->id;
            $existingName->save();
        }
        return response()->json($existingName);
    }


    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Activity $activity)
    {
        $activity = Activity::find($request->id);
        dd($activity);
        $precipitations = $activity->weatherCondition->precipitations->pluck('name');
        return view('activities.edit', compact('activity', 'precipitations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
