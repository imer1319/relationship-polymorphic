@extends('layouts.layout')

@section('title')
{{ $user->name }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 my-3 pt-3 shadow">
            <img src="{{ $user->image->url }}" class="float-left rounded-circle mr-3">
            <h1>{{ $user->name }}</h1>
            <h3>{{ $user->email }}</h3>
            <p>
                <b>Instagram :</b>{{ $user->profile->instagram }}<br>
                <b>Github :</b>{{ $user->profile->instagram }}<br>
                <b>Website :</b>{{ $user->profile->web }}
            </p>
            <p>
                <b>Pais :</b> {{ $user->location->country }}<br>
                <b>Nivel :</b>
                @if($user->level)
                <a href="{{ route('level',$user->level->id) }}">{{ $user->level->name }}</a>
                @else
                ---
                @endif
                <hr>
                <p>
                    <b>Grupos</b>
                    @forelse($user->groups as $group)
                    <span class="badge badge-info">{{ $group->name }}</span>
                    @empty
                    <p>No perteneces a un grupo</p>
                    @endforelse
                </p>
                <hr>
                <h3>Posts</h3>
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
                <h3>Videos</h3>
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