@extends('layouts.app')

@section('content')

    <div class="container-fluid" style="padding-top: 10px">
        <div class="row">
            <div class="col-lg-3 ">
                <form method="POST" action='/search'>
                    <div class="container">
                        <div class="form-group">
                            @csrf
                            <input class="form-control" type="text" placeholder="Search" name="searchval">
                            <button type="submit" class="btn btn-danger" style="width:100%; margin-top: 10px">Go!</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="col-8">
                <form method="POST" action="/seeker/create" enctype="multipart/form-data">
                    <fieldset style="padding:16px;   border:2px solid grey; -moz-border-radius:8px; -webkit-border-radius:8px;	border-radius:8px;	" >
                        <legend style="text-align: center">Create Post</legend>
                        {{csrf_field()}}    

                        <div class="form-group">
                            <input  class="form-control" name="title" placeholder="Title">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="body" rows="5" placeholder="Post Body"></textarea>
                        </div>
                        
                        <button type="submit" style="width: 100%" class="btn btn-success">Publish Post  </button>
                    </fieldset> 
                </form>
            
            <hr>

            <div>
                @foreach ($posts as $post )
                    
                    <div class="card mb-3">
                        <div class="card-header">
                            <a href="seeker/profile/show/{{ $post->user_id }}">
                                <span> <i class="fa fa-user" aria-hidden="true"></i> {{ $post->auther }} </span>                    
                            </a>
                        </div>
                        <div class="card-body" style="flex-direction: column">
                            <h3><strong>{{ $post->title }} </strong></h3>
                            <p>
                                {{ $post->body }}
                            </p>
                        </div>
                        <div class="card-footer small text-muted">
                            <small> {{ $post->created_at }} </small>
                        </div>
                    </div>  
                    
                @endforeach
            </div>
        </div>
    </div>
</body>

@endsection