@extends('layouts.app')

@section('content')
{{-- 'title', 'subtitle', 'description', 'Location', 'from', 'to', --}}

    <div class="container">
        <form action="/seeker/profile/experience" method="post">
            @csrf

            <div class="form-group">
                <label for="title">Job Type* </label>
                <input type="text" class="form-control" value="{{ old('title') }}"  id="title" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="subtitle">Position*</label>
                <input type="text" class="form-control" value="{{ old('subtitle') }}" id="subtitle" name="subtitle" placeholder="Position">
            </div>  
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="Description">{{ old('description') }}</textarea>
                    </div>                    
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="Location">Location</label>
                        <input type="text" value="{{ old('Location') }}" class="form-control" id="Location" name="Location" placeholder="Location">
                    </div>  
                    <div class="form-group">
                        <label for="from">Start Date*</label>
                        <input type="text" value="{{ old('from') }}" class="form-control" id="from" name="from" placeholder="From">
                    </div>
        
                    <div class="form-group">
                        <label for="to">End Date</label>
                        <input type="to" value="{{ old('to') }}"  class="form-control" id="to" name="to" placeholder="To">
                    </div>
                </div>
            </div>

            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <button type="submit" class="btn btn-primary" style="width: 100%" >Submit</button>           
        </form>
    </div>

   
@endsection