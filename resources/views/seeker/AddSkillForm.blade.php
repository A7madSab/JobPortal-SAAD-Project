@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/seeker/profile/skill" method="post">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col-2">
                        <label for="name">Skill</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Html">
                    </div>
                    <div class="col-8">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="...">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="form-control" style="margin-top:30px;"> Submit</button>                   
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection