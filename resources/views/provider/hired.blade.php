@extends('layouts.app-provider')

@section('content')

<div class="container">
<section class="justify-content-center">
    <br>
    <div class="row">
        <div class="col-10">
            <h2>Vacancies & Applications </h2>
        </div>
        <div class="col-2">
            <a href="vacancy/add" style="padding-bottom: 20px;">    
                <button type="button" class="btn btn-primary btn-circle">
                <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </a>
        </div>
    </div>  

    <div class="row">
        @foreach ($vacancies as $v)
            <div class="card" style="width: 20rem; margin-right: 25px; margin-bottom: 25px;">
                <h1 style="text-align: center; margin-top: 30px;">{{ $v->title }}</h1>
            <div class="card-body">
                <h5 class="card-title">{{ $v->position}} - <small>{{ $v->created_at }}</small></h5>
                <hr>
                <h2 style="text-align: center">Status: {{ $v->status }}</h2>
                <p class="card-text">Description: {{ $v->body}} </p>
                <hr>
                <div class="row">
                <div class="col-4" style="padding-left: 40px;">
                    <a href="vacancy/edit/{{ $v->id }}" >    
                        <button type="button" class="btn btn-secondary btn-circle">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                    </a>
                </div>
                <div class="col-4" style="padding-left: 40px;">
                    <a href="vacancy/delete/{{ $v->id }}">    
                        <button type="button" class="btn btn-danger btn-circle">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </a>
                </div>
                <div class="col-4" style="padding-left: 40px;">
                    <a href="vacancy/applications/{{ $v->id }}" >    
                        <button type="button" class="btn btn-primary btn-circle">
                        <i class="fa fa-object-ungroup" aria-hidden="true"></i>
                        </button>
                    </a>
                </div>
                </div>
            </div>
            </div>

        @endforeach
        <br>
    </div>
</section>
</div>
@endsection