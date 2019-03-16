@extends('layouts.app')
@section('content')
    <div class="type">
        <form  method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {!!  Form::open(['url'=>'posts/edit/'.$id]) !!}
            <h1>Add post</h1>
            @foreach($post as $object)
            <div  class="form-group">
                {!! Form::label('name','Name') !!}
                {!! Form::text('name',$object->name,['class'=>"form-control"]) !!}

            </div>
            <div class="form-group">
                {!! Form::label('content','Content:') !!}
                {!! Form::textarea('content',$object->content,['class'=>"form-control"]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category','Category') !!}
                <select id="category_id" type="text" class="form-control" name="category_id" value="{{ old('category_id') }}" required autofocus>
                    @foreach($categories as $category)
                        <option name = "{{$category->id}}" value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            @endforeach
            <div class="form-group">{!! Form::file('file',null,['class'=>"form-control"]) !!}</div>
            <div class="form-group">{!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}</div>
            {!! Form::close() !!}
        </form>
    </div>
@endsection