@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Edit Activity</h2>
                <form method="POST" action="{{ route('activities.update', $activity->id) }}">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $activity->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="temp_min" class="form-label">Temp Min</label>
                        <input type="text" class="form-control" id="temp_min" name="temp_min"
                            value="{{ $activity->weatherCondition->temperature_min }}">
                    </div>
                    <div class="mb-3">
                        <label for="temp_max" class="form-label">Temp Max</label>
                        <input type="text" class="form-control" id="temp_max" name="temp_max"
                            value="{{ $activity->weatherCondition->temperature_max }}">
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration"
                            value="{{ $activity->duration }}">
                    </div>

                    <div class="mb-3">
                        <label for="windspeed" class="form-label">Windspeed</label>
                        <input type="text" class="form-control" id="windspeed" name="windspeed"
                            value="{{ $activity->weatherCondition->wind_speed }}">
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location"
                            value="{{ $activity->location }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <h5>Wind Direction</h5>
                    <div class="btn-group wind-direction-buttons" role="group" aria-label="Wind Direction">
                        @foreach ($windDirections as $WindDirection)
                            <button type="button" class="btn btn-secondary toggle-button" data-value="{{ $WindDirection->direction }}">{{ $WindDirection->direction }}</button>
                        @endforeach
                        <input type="hidden" name="selected_wind_directions" id="selected_wind_directions" value="">
                    </div>
                </div>

                <div class="mb-3">
                    <h5>Precipitation</h5>
                    <div class="btn-group precipitation-buttons" role="group" aria-label="Precipitation">
                        @foreach ($precipitations as $precipitation)
                            <button type="button" class="btn btn-secondary toggle-button"
                                data-value="{{ $precipitation->type }}">{{ $precipitation->type }}</button>
                        @endforeach
                        <input type="hidden" name="selected_precipitations" id="selected_precipitations"
                            value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
