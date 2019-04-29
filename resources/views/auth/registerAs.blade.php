@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row" style="margin-top: 30px">
                
            {{-- deh eli heya deh fen el form bta3 el pr --}}
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Register as a Job Seeker</h5>
                        <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                        <a href="/register/seeker" class="btn btn-primary">Job Seeker Registration</a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Register as a Job Provider</h5>
                        <p class="card-text">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system. No one rejects, dislikes.</p>
                        <a href="/register/Jobprovider" class="btn btn-primary">Job Provider Registration</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection