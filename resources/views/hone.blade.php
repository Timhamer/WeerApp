@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <h3>Your Activities</h3>

                    @if (count($activities) > 0)
                        <ul>
                            @foreach ($activities as $activity)
                                <li>{{ $activity->description }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>You have no activities.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection