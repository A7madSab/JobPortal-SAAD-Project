@extends('layouts.app')

@section('content')

{{-- id place degree detail grade user_id --}}

    <div class="container">
        <form action="/seeker/profile/education/edit" method="post">
            @csrf

            <div class="form-group">
                <label for="place">Extablishment*</label>
                <input type="text" value="{{ $edu->place }}" class="form-control" id="place" name="place" placeholder="Cairo University">
            </div>

            <div class="form-group">
                <label for="degree">Degree*</label>
                <input type="text" value="{{ $edu->degree }}" class="form-control" id="degree" name="degree" placeholder="bachelor's degree">
            </div>
            
            <div class="form-group">
                <label for="detail">Field*</label>
                <input type="text" value="{{ $edu->detail }}" class="form-control" id="detail" name="detail" placeholder="Software Engineering ">
            </div>
            
            <div class="form-group">
                <label for="grade">Grade*</label>
                <input type="text" value="{{ $edu->grade }}" class="form-control" id="grade" name="grade" placeholder="4.0 !">
            </div>
            
            <input type="hidden" name="id"  value="{{ $edu->id }}">

            <button type="submit" class="btn btn-primary" style="width: 100%" >Submit</button>  

        </form>
    </div>

@endsection