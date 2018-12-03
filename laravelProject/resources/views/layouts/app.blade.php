<!DOCTYPE html>
<html>
    <head>
        <title>DA Blog - @yield('title')</title>
            <link href="{{ URL::asset('css/app.css') }}"
              rel="stylesheet"
              type="text/css">
    </head>
    <body style="margin: 0;">
    @section('navbar')
        <div id="navbar">
            <a class="navbar-brand" style="font-size: 30px; color: white" href="/">DaBlog</a>
            <button class="button" onclick="location.href='{{ url('') }}'">Home</button>
            <button class="button" onclick="location.href='{{ url('posts') }}'">Blogs</button>
            <button class="button" onclick="location.href='{{ url('about') }}'">About</button>
            <button class="button" onclick="location.href='{{ url('posts/create') }}'">Create Post</button>
        </div>
    @show
        <div id="main">
            <div class="contentBlock">
                <div class="container" style="width:100%">
                    @include('inc.messages')
                    @yield('content')
                </div>
            </div>
            <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace ( 'article-ckeditor' );
            </script>
        </div>
    </body>
</html>