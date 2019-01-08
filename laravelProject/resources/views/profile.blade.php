@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="/storage/avatars/{{$user->avatar}}" style="width: 150px; height: 150px; float: left; margin-right: 25px;";/>
                    <h2>{{$user->name}}'s Profile</h2>
                    {!! Form::open(['action' => ['UserController@update_avatar',$user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <label>Update Profile Image</label>
                    <div class="form-group">
                        {{Form::file('avatar')}}
                    </div>
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                    {!! Form::close() !!}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection