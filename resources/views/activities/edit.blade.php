@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Edit Activity</h2>
            <form method="POST" action="{{ route('activities.update', $activity->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="temp_max" class="form-label">Temp Max</label>
                    <input type="text" class="form-control" id="temp_max" name="temp_max" value="{{ $activity->temp_max }}">
                </div>

                <div class="mb-3">
                    <label for="temp_min" class="form-label">Temp Min</label>
                    <input type="text" class="form-control" id="temp_min" name="temp_min" value="{{ $activity->temp_min }}">
                </div>

                <div class="mb-3">
                    <label for="windspeed" class="form-label">Windspeed</label>
                    <input type="text" class="form-control" id="windspeed" name="windspeed" value="{{ $activity->windspeed }}">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $activity->name }}">
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="text" class="form-control" id="duration" name="duration" value="{{ $activity->duration }}">
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $activity->location }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <h5>Wind Direction</h5>
                <div class="btn-group" role="group" aria-label="Wind Direction">
                    <button type="button" class="btn btn-secondary">N</button>
                    <button type="button" class="btn btn-secondary">NE</button>
                    <button type="button" class="btn btn-secondary">E</button>
                    <button type="button" class="btn btn-secondary">SE</button>
                    <button type="button" class="btn btn-secondary">S</button>
                    <button type="button" class="btn btn-secondary">SW</button>
                    <button type="button" class="btn btn-secondary">W</button>
                    <button type="button" class="btn btn-secondary">NW</button>
                </div>
            </div>

            <div class="mb-3">
                <h5>Precipitation</h5>
                <div class="btn-group" role="group" aria-label="Precipitation">
                    @foreach($precipitations as $precipitation)
                        <button type="button" class="btn btn-secondary">{{ $precipitation->name }}</button>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <h5>Cloudiness</h5>
                <!-- Add your cloudiness buttons here -->
            </div>
        </div>
    </div>
</div>
@endsection
