@extends('layouts.app')
@section('content')
    {!! Form::open(['url'=>'/posts/add_post']) !!}
    {!! Form::submit('Add Post',['class'=>"form-control"]) !!}
    {!! Form::close() !!}
            @foreach($posts as $post)
            <div class="all">
                <div class="name"><h1>{{$post->name}}</h1></div>
                <div class="image"><img src="{{asset('/images/'.$post->file)}}"class="img-responsive"></div>
                <div class="content1"><h1 class="text-justify">{{$post->content}}</h1></div>
                <div class="comments">
                    {!! Form::open(['url'=>'posts/view/'.$post->id]) !!}
                    {{method_field('GET')}}
                    {!! Form::submit('Comments...',['class'=>"form-control"]) !!}
                    {!! Form::close() !!}
                    <div class="row">
                        <div class="col-xs-6">
                            {!! Form::open(['url'=>'posts/edit/'.$post->id]) !!}
                            {{method_field('GET')}}
                            {!! Form::submit('Edit',['class'=>'form-control']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div class="col-xs-6">
                            {{method_field('POST')}}
                            {!! Form::open(['url'=>'posts/delete/'.$post->id]) !!}
                            {!! Form::submit('Delete',['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

            </div>
            @endforeach

@endsection