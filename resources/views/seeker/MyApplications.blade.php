@extends('layouts.app')
@section('content')

<h2 align="center">
    Applications 
</h2>
    @foreach ($application as $app)

        <div class="container ">
            <div class="card">
                <div class="row">
                    <div class="col-8">
                        <div class="card-body">
                            <h5 class="card-title">Title: {{ App\Vacancy::findorfail($app->vac_id)->title }}</h5>
                            <p class="card-text" style="text-align: left"><strong>Proposal:</strong> {{ $app->body }}</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <h1>Status: <small>{{ $app->status }}</small></h1>
                    </div>
                    <div class="col-2" style="padding-top:30px">
                        <a href="/seeker/application/delete/{{ $app->id }}">
                            <button class="btn btn-danger"> Delete</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
            
        <br>
    @endforeach
@endsection