@extends('layouts.app-provider')

@section('content')

    <div class="container">
        <form action="/JobProvider/vacancy/edit" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title*</label>
                <input type="text" value="{{ $vacancy->title }}" class="form-control" name="title" id="title" required>
            </div>

            <div class="form-group">
                <label for="position">Position*</label>
                <input type="text" value="{{ $vacancy->position }}" class="form-control" name="position" id="position" required>
            </div>

            <div class="form-group">
                <label for="body">Body*</label>
                <textarea name="body" class="form-control" id="body" cols="30" rows="10" required> {{ $vacancy->body }}</textarea>
            </div>

            <input type="hidden" value="{{ $vacancy->id }}" name="id">
            <button class="form-control" type="submit">Submit</button>
        </form>
    </div>

@endsection