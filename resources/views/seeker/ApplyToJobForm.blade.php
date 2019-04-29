@extends('layouts.app')

@section('content')
    
<div class="container">

    <h2> {{ $vac->title }} </h2>

    <form action="/seeker/apply/{{ $vac->id }}" method="post">
        @csrf
        <div class="form-group">
            <label for="body">Proposal*</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10" required placeholder="I am an expert in this feild...">{{ old('body') }}</textarea>
        </div>

        <button class="form-control" type="submit">Submit</button>
    </form>
</div>
@endsection