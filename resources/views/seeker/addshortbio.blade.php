@extends('layouts.app')


@section('content')

    <div class="container">
        <form action="/seeker/profile/bio" method="post">
            @csrf

            <label for="short_bio">Short Bio</label>
            <textarea class="form-control" id="short_bio" name="short_bio" rows="3">{{ $user->short_bio }}</textarea>
            <br>
            <button type="submit" class="btn btn-primary mb-2">Submit</button>

            <input type="hidden" name="id" value="{{ $user->id }}">
        </form>
    </div>
    
@endsection