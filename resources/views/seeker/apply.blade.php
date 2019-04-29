@extends('layouts.app')

@section('content')
        
    <div class="container">
        @foreach ($vacancies as $v)
            <div class="card">
                <div class="card-header">
                    <h5 style="text-align: center">{{ $v->title }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6" align="center">
                            <h4>{{ App\JobProvider::findorfail($v->provider_id)->name }} Info</h4>
                            <div class="row">
                                <div class="col-6">Email:
                                    <a href="mailto:{{ App\JobProvider::findorfail($v->provider_id)->email }}">
                                         {{ App\JobProvider::findorfail($v->provider_id)->email }}
                                    </a>
                                </div>
                                <div class="col-6">
                                    <div>
                                        Phone: {{ App\JobProvider::findorfail($v->provider_id)->phone }}
                                    </div>  
                                </div>
                            </div>
                            
                            <div style="max-height: 200px">
                                Bio:  {{ App\JobProvider::findorfail($v->provider_id)->bio }}
                            </div>
                        </div>

                        <div class="col-6" style="border-left: 1.5px solid lightgray;">
                            <div>
                                <strong>Position: </strong>{{ $v->position}}
                            </div>

                            <div>
                                <strong> Details: </strong> {{ $v->body }}
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <div class="container">
                                        <a href="/seeker/apply/{{ $v->id }}">
                                            <button class='btn btn-success' style="width:100%">Apply</button>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="container">
                                        <a href="/seeker/savedjob/{{ $v->id }}">
                                            <button class='btn btn-primary' style="width:100%">Save</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <br>
        @endforeach
    </div>

@endsection