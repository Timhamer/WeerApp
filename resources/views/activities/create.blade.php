@extends('layouts.app')

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const precipitationButtons = document.querySelectorAll('.precipitation-buttons .toggle-button');
        const windDirectionButtons = document.querySelectorAll('.wind-direction-buttons .toggle-button');

        const handlePrecipitationButtonClick = function() {
            handleButtonClick.call(this, 'selected_precipitations', '.precipitation-buttons');
        };

        const handleWindDirectionButtonClick = function() {
            handleButtonClick.call(this, 'selected_wind_directions', '.wind-direction-buttons');
        };

        const handleButtonClick = function(targetInputId, groupSelector) {
            // Toggle the 'active' class
            this.classList.toggle('active');

            // Get all selected values for the specific group
            const selectedValues = Array.from(document.querySelectorAll(`${groupSelector} .toggle-button.active`))
                .map(button => button.getAttribute('data-value'));
            console.log(selectedValues);

            // Update the hidden input with selected values
            document.getElementById(targetInputId).value = selectedValues.join(',');
        };

        precipitationButtons.forEach(button => {
            button.addEventListener('click', handlePrecipitationButtonClick);
        });

        windDirectionButtons.forEach(button => {
            button.addEventListener('click', handleWindDirectionButtonClick);
        });
    });
</script>
@endsection

@section('content')
    <form method="POST" action="{{ route('activities.store') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Edit Activity</h2>
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"
                            value="">
                    </div>

                    <div class="mb-3">
                        <label for="temp_max" class="form-label">Temp Max</label>
                        <input type="text" class="form-control" id="temp_max" name="temp_max"
                            placeholder="Enter Temp Max" value="">
                    </div>

                    <div class="mb-3">
                        <label for="temp_min" class="form-label">Temp Min</label>
                        <input type="text" class="form-control" id="temp_min" name="temp_min"
                            placeholder="Enter Temp Min" value="">
                    </div>

                    <div class="mb-3">
                        <label for="windspeed" class="form-label">Windspeed</label>
                        <input type="text" class="form-control" id="windspeed" name="windspeed"
                            placeholder="Enter Windspeed" value="">
                    </div>

                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration"
                            placeholder="Enter Duration" value="">
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location"
                            placeholder="Enter Location" value="">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5>Wind Direction</h5>
                        <div class="btn-group wind-direction-buttons" role="group" aria-label="Wind Direction">
                            @foreach ($windDirections as $direction)
                                <button type="button" class="btn btn-secondary toggle-button" data-value="{{ $direction }}">{{ $direction }}</button>
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

                    <h5>Cloudiness</h5>
                    <div class="mb-3">
                        <label for="cloudiness" class="form-label">Cloudiness</label>
                        <input type="text" class="form-control" id="cloudiness" name="cloudiness"
                            placeholder="Enter cloudiness" value="">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
