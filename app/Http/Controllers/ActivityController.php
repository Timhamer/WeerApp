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
        $windDirections = DB::table('wind_directions')->get();

        //compact the precipitations and wind directions and send them to the view
        return view('activities.create', compact('precipitations', 'windDirections'));
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
            $weatherCondition->temperature_min = $request->temp_min;
            $weatherCondition->temperature_max = $request->temp_max;
            $weatherCondition->wind_speed = $request->windspeed;
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
                $windDirectionId = DB::table('wind_directions')->where('direction', $windDirection)->value('id');
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
        return redirect()->route('home');
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
        $activity = Activity::with(['weatherCondition.precipitations', 'weatherCondition.winddirections'])
            ->find($request->id);
            $precipitations = DB::table('precipitations')->get();
            $windDirections = DB::table('wind_directions')->get();

        return view('activities.edit', compact('activity', 'precipitations', 'windDirections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the activity to be updated
        $existingName = Activity::findOrFail($id);
    
        // Check if the new name already exists
        if ($existingName->name != $request->name) {
            $nameExists = Activity::where('name', $request->name)->first();
            if ($nameExists) {
                // Handle the case where the new name already exists
                // You can redirect back with an error message or handle it as per your requirement
                return redirect()->back()->with('error', 'The name already exists. Please choose a different name.');
            }
        }
    
        // Update the weather condition
        $weatherCondition = WeatherCondition::findOrFail($existingName->weather_id);
        $weatherCondition->temperature_min = $request->temp_min;
        $weatherCondition->temperature_max = $request->temp_max;
        $weatherCondition->wind_speed = $request->windspeed;
        $weatherCondition->save();
    
        // Update the selected precipitations
        $precipitations = $request->selected_precipitations;
        $precipitationArray = explode(',', $precipitations);
        $weatherCondition->precipitations()->detach(); // Remove existing associations
        foreach ($precipitationArray as $precipitation) {
            $precipitationId = DB::table('precipitations')->where('type', $precipitation)->value('id');
            $weatherCondition->precipitations()->attach($precipitationId);
        }
    
        // Update the selected wind directions
        $windDirections = $request->selected_wind_directions;
        $windDirectionsArray = explode(',', $windDirections);
        $weatherCondition->windDirections()->detach(); // Remove existing associations
        foreach ($windDirectionsArray as $windDirection) {
            $windDirectionId = DB::table('wind_directions')->where('direction', $windDirection)->value('id');
            $weatherCondition->windDirections()->attach($windDirectionId);
        }
    
        // Update the activity details
        $existingName->name = $request->name;
        $existingName->duration = $request->duration;
        $existingName->location = $request->location;
        $existingName->save();
    
        return redirect()->route('home')->with('success', 'Activity updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
