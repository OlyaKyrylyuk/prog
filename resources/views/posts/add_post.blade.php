@extends('layouts.app')
@section('content')
    <div class="type">
        <form  method="post" action="/posts/create" enctype="multipart/form-data">
            {{csrf_field()}}
            <h1>Add post</h1>
                <div  class="form-group">
                    {!! Form::label('name','Name') !!}
                    {!! Form::text('name',null,['class'=>"form-control"]) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('content','Content:') !!}
                    {!! Form::textarea('content',null,['class'=>"form-control"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category','Category') !!}
                    <select id="category_id" type="text" class="form-control" name="category_id" value="{{ old('category_id') }}" required autofocus>
                        @foreach($categories as $category)
                            <option name = "{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">{!! Form::file('file',null,['class'=>"form-control"]) !!}</div>
            <div class="form-group">{!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}</div>
        </form>
    </div>
@endsection