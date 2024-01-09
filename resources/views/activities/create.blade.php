@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/activities" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Activity Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <!-- Add more input fields as needed -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection