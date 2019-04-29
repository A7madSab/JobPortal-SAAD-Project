@extends('layouts.app')


@section('content')

    <div class="container">
        <form action="/seeker/profile/certifications" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Certifications & Awards</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Google Analytics Certified Developer">
            </div>
            
            <input type="hidden" name="user_id" value="{{ $user->id }}">
           

            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
    
@endsection