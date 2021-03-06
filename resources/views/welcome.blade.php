@extends('layouts.layout')

@section('title','Inicio')

@section('content')
<div class="container">
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
        @endif
        @endauth
    </div>
    @endif
    <h1>Relaciones</h1>
    <div>
        @foreach($users as $user)
        <a href="{{ route('profile',$user->id) }}">{{ $user->name }}</a><br>
        @endforeach
    </div>
</div>
@endsection