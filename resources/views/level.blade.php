@extends('layouts.layout')

@section('title')
Usuarios de nivel {{ $level->name }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3 pt-3 shadow">
            <p>
                <h3>Contenido de usuarios nivel {{ $level->name }}</h3>
                <hr>
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ $post->image->url }}" class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->name }}</h5>
                                        <h6 class="text-muted">
                                            {{ $post->category->name }}|
                                            {{ $post->comments_count }}
                                            {{ Str::plural('comentario',$post->comments_count) }}
                                        </h6>
                                        <p class="text-muted">
                                            @foreach($post->tags as $tag)
                                            <span class="badge badge-primary">#{{ $tag->name }}</span>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <hr>
                <h3>Contenido en videos de usuarios nivel {{ $level->name }}</h3>
                <hr>
                <div class="row">
                    @foreach($videos as $video)
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{ $video->image->url }}" class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $video->name }}</h5>
                                        <h6 class="text-muted">
                                            {{ $video->category->name }}|
                                            {{ $video->comments_count }}
                                            {{ Str::plural('comentario',$video->comments_count) }}
                                        </h6>
                                        <p class="text-muted">
                                            @foreach($video->tags as $tag)
                                            <span class="badge badge-primary">#{{ $tag->name }}</span>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </p>
        </div>
    </div>
</div>
@endsection