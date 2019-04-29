@extends('layouts.app')

@section('content')
{{-- 'title', 'subtitle', 'description', 'Location', 'from', 'to', --}}

    <div class="container">
        <form action="/seeker/profile/experience/edit" method="post">
            @csrf

            <div class="form-group">
                <label for="title">Job Type* </label>
                <input type="text" value="{{ $exp->title }}" class="form-control" id="title" name="title" placeholder="title">
            </div>
            <div class="form-group">
                <label for="subtitle">Position* </label>
                <input type="text" value="{{ $exp->subtitle }}" class="form-control" id="subtitle" name="subtitle" placeholder="subtitle">
            </div>  
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea name="description" class="form-control" id="description" cols="30" rows="10" placeholder="description">{{ $exp->description}}</textarea>
                    </div>                    
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="Location">Location</label>
                        <input type="text" class="form-control" value="{{ $exp->Location }}" id="Location" name="Location" placeholder="Location">
                    </div>  
                    <div class="form-group">
                        <label for="from">Start Date* </label>
                        <input type="text" class="form-control" value="{{ $exp->from }}" id="from" name="from" placeholder="from">
                    </div>
        
                    <div class="form-group">
                        <label for="to">End Date</label>
                        <input type="to" class="form-control" value="{{ $exp->to }}" id="to" name="to" placeholder="to">
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="{{ $exp->id }}">

            <button type="submit" class="btn btn-primary" style="width: 100%" >Submit</button>           
        </form>
    </div>

@endsection