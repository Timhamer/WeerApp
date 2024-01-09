<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Repetition;
use Illuminate\Http\Request;
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
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->input('name');

        // $existingName = Activity::where('name', $name)->first();

        // if ($existingName) {
            
        // } else {
            $repetition = new Repetition();
            $repetition->save();

            $existingName = new Activity();
            $existingName->user_id = auth()->user()->id;
            $existingName->name = $name;
            $existingName->duration = 1;
            $existingName->location = 'home';
            $existingName->repetition_id = $repetition->id;
            $existingName->save();
        // }
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
    public function edit(Activity $activity)
    {
    $precipitations = DB::table('precipitations')->pluck('name');
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
