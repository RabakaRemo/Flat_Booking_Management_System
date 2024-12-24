@extends('layouts.dashboard_layout')
@section('title', 'Create Location')

@section('dash_content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Create Location</h1>
                <form action="{{ route('locations.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="Enter location name" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Add more fields as needed -->
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>

@endsection
