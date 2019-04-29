@extends('layouts.app')


@section('content')

    <div class="container">
        <form action="/seeker/profile/longbio" method="post">
            @csrf

            <label for="long_bio">Long Bio</label>
            <textarea class="form-control" id="long_bio" name="long_bio" rows="3">{{ $user->long_bio }}</textarea>
            <br>
            <input type="hidden" name="id" value="{{ $user->id }}">
            
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
    
@endsection