@extends('layouts.app')

@section('content')

    <body style="background-color: #748b8b;">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Activities block -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center rounded-top border-0" style="background-color: #bdd8e0;">
                            <h1></h1> <!-- To make the create button on the right -->
                            <a href="{{ route('activities.create') }}" class="btn rounded-pill"
                                style="background-color: #001764; color: white;">{{ __('Add Activity') }}</a>
                        </div>
                        <div class="card-body" style="background-color: #bdd8e0;">
                            <div class="card-header text-center text-white"
                                style="background-color: #bdd8e0; font-weight: bold; font-size: 2em;">
                                List of Activities
                            </div>
                            @foreach ($activities as $activity)
                                <div class="card position-relative border-0" style="border-bottom: 1px solid #748b8b;">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h5 class="card-title">{{ $activity->name }}</h5>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <p class="card-text mr-2">Duration: {{ $activity->duration }} minutes</p>
                                            <p class="card-text">Location: {{ $activity->location }}</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('activities.edit', $activity->id) }}"
                                        class="position-absolute top-0 end-0 m-2 btn">
                                        <i class="fas fa-edit text-dark"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Weather and text blocks -->
                <div class="col-md-6">
                    <!-- Weather block -->
                    <div class="card" style="background-color: #bdd8e0;">
                        <div class="card-header text-white">{{ __('Weather') }}</div>
                        <div class="card-body d-flex flex-row justify-content-around flex-wrap" style="background-color: #bdd8e0;">
                            @if (!empty($sevenDayForecast))
                                @php $counter = 0; @endphp
                                @foreach ($sevenDayForecast as $day)
                                    @if ($counter == 7)
                                        @break
                                    @endif
                                    @php
                                        $date = new DateTime($day['day']);
                                        $dayOfWeek = $date->format('D');
                                    @endphp
                                    <div class="weather-day">
                                        <strong>{{ $dayOfWeek }}</strong><br>
                                        @switch($day['condition'])
                                        @case('bewolkt')
                                        <i class="fas fa-cloud"></i>
                                        @break
                                        
                                        @case('buien_zon_wolken')
                                        <i class="fas fa-cloud-sun-rain"></i>
                                        @break
                                        
                                        @case('')
                                        <i class="fas fa-cloud"></i>
                                        @break
                                        
                                        @default
                                        <i class="fas fa-question"></i>
                                        @endswitch
                                        <br>
                                        {{ $day['min_temp'] }}°C<br>
                                        {{ $day['max_temp'] }}°C
                                    </div>
                                    @php $counter++; @endphp
                                @endforeach
                            @else
                                <p>No weather data available.</p>
                            @endif
                        </div>
                    </div>

                <!-- Text block -->
                <div class="card mt-4" style="background-color: #bdd8e0;">
                    <div class="card-header text-white">{{ __('Text') }}</div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
