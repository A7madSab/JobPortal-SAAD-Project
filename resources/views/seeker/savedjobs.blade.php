
@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($savedjobs as $job)
            {{ App\Vacancy::findorfail($job->vac_id)->title }}
            <br>
        @endforeach
    </div>

@endsection