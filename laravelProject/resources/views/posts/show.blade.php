@extends('layouts.app')
@section('title', 'DA Post '.$post->title)
@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{$post->title}}</h1>
    <img class="image" src="/storage/cover_images/{{$post->cover_image}}">
    <br>
    <br>
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
<div style="display: inline-block;">
    @if(!Auth::guest()) 
        @if(Auth::user()->id == $post->user_id)
            <a class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</a>
            {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close() !!}
        @endif
    @endif
{!!Form::open(['action' => ['PostController@export_pdf', $post->id], 'method' => 'GET', 'class' => 'pull-right'])!!}
    {{Form::submit('Export as PDF', ['class' => 'btn btn-primary'])}}
{!!Form::close() !!}
</div>
@endsection