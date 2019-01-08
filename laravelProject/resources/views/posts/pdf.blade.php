<html>
<body>
<h1>{{$post->title}}</h1>
    <br><br><br><br>
    <div>
    <img class="image" style="width: 50%;" src="storage/cover_images/{{$post->cover_image}}">
    <div>
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>
    </div>
</body>
</html>
