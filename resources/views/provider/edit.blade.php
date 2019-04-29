@extends('layouts.app-provider')

@section('content')

    <div class="container">
        <form action="/JobProvider/profile/edit" method="post">
            @csrf

            <div class="form-group">
                <label for="address">Address </label>
                <input type="text" value="{{ $Provider->address }}" class="form-control" id="address" name="address" placeholder="Address">
            </div>

            <div class="form-group">
                <label for="Phone">Phone </label>
                <input type="text" value="{{ $Provider->Phone }}" class="form-control" id="Phone" name="phone" placeholder="Phone">
            </div>

            <label for="bio">Bio</label>
            <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Bio">{{ $Provider->bio }}</textarea>
            <br>
            
            <input type="hidden" value={{ $Provider->id }} name="id">

            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
    
@endsection