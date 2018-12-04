@extends('layouts.app')
@section('title', 'DaIndex Page')
    @section('content')
    @if(Auth::guest())
    <div class="jumbotron text-center">
        <p class="text">This is a blog website for WEB3 created by Atanas Marchev and Denis Bogdanov.</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
        <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
    @endif
    @endsection