@extends('layouts.app-provider')

@section('content')

{{-- 'title', 'position', 'body', 'provider_id', --}}
    <div class="container">
        <form action="/JobProvider/vacancy" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title*</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="position">Position*</label>
                <input type="text" class="form-control" name="position" id="position" required>
            </div>

            <div class="form-group">
                <label for="body">Body*</label>
                <textarea name="body" class="form-control" id="body" cols="30" rows="10" required></textarea>
            </div>
            <button class="form-control" type="submit">Submit</button>
        </form>
    </div>

@endsection