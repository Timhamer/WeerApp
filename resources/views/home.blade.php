@extends('layouts.app')

@section('scripts')
<script>
jQuery(document).ready(function($) {

    $('#saveActivityButton').click(function() {
        console.log('saveActivityButton clicked');
        $.ajax({
            url: 'activities',
            type: 'post',
            data: {
                _token: '{{ csrf_token() }}',
                name: $('#name').val()
            },
            success: function(response) {
                // Redirect to the edit form of the newly created activity
                window.location.href = '/activities/' + response.id + '/edit';
            }
        });
    });
});

</script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Activities block -->
<div class="col-md-6">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            {{ __('Activities') }}
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addActivityModal">{{ __('Add Activity') }}</a>
        </div>
        <div class="card-body">
            
        </div>
    </div>
</div>

        <!-- Weather and text blocks -->
        <div class="col-md-6">
            <!-- Weather block -->
<div class="card">
    <div class="card-header">{{ __('Weather') }}</div>
    <div class="card-body d-flex flex-wrap">
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
                <div class="weather-day p-2" style="flex: 1 0 20%; min-width: 120px;">
                    <strong>{{ $dayOfWeek }}</strong><br>
                    {{ $day['min_temp'] }}°C ~ {{ $day['max_temp'] }}°C<br>
                    {{ $day['condition'] }}
                </div>
                @php $counter++; @endphp
            @endforeach
        @else
            <p>No weather data available.</p>
        @endif
    </div>
</div>

            <!-- Text block -->
            <div class="card mt-4">
                <div class="card-header">{{ __('Text') }}</div>
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Activity Modal -->
<div class="modal fade" id="addActivityModal" tabindex="-1" role="dialog" aria-labelledby="addActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addActivityModalLabel">Add Activity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addActivityForm" action="/activities" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Activity Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveActivityButton">Save Activity</button>
            </div>
        </div>
    </div>
</div>
@endsection

