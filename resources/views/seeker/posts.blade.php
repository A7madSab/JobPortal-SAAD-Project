@extends('layouts.app')

@section('content')
    <div class="container">
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
@endsection