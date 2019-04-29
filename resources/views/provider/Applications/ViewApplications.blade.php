
@extends('layouts.app-provider')
@section('content')

    <div class="container">

        <section class="justify-content-center">
        <br>
        <div class="row">
            <div class="col-10">
                <h2>Application</h2>
            </div>
        </div>  
    
        @foreach ($applications as $app)
            <br>
            <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-10">
                    {{ App\Vacancy::findorfail($app->vac_id)->title }} -
                    <a href="/JobProvider/vacancy/profile/preview/{{ $app->user_id }}">
                        <strong>
                            {{  App\User::findorfail($app->user_id)->name }}
                        </strong>
                    </a>
                </div>
                
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="container">
                            <h4>Applicant Info</h4>
                            Address: {{ App\User::findorfail($app->user_id)->address }}
                            <br>
                            Phone: {{ App\User::findorfail($app->user_id)->phone }}
                            <br>
                            Address: {{ App\User::findorfail($app->user_id)->address }}
                        </div>
                    </div>
                    <div class="col-8" style="border-left: 1.5px solid lightgray;"><strong>Proposal:</strong>{{ $app->body }}
                    </div>
                </div>

                <h5 class="card-title"></h5>
                <p class="card-text"></p>
            </div>
            <div class="card-footer text-muted">
                Applied At: {{ $app->created_at }} 
            </div>
            </div>
            <br>
        @endforeach 
        </section>
    


    </div>
@endsection