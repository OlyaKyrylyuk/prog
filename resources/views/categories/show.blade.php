@extends('layouts.app')
@section('content')
    {!! Form::open(['url'=>'categories/edit/'.$id]) !!}
    {{method_field('POST')}}
<div class="form-group">
@foreach($category as $object)
    {!! Form::label('name','Name:')  !!}
    {!! Form::text('name',$object->name,['id'=>'name','class'=>'form-control',]) !!}

</div>
    <div class="form-group">

        {!! Form::label('description','Description:')  !!}
        {!! Form::textarea('description',$object->description,['id'=>'description','class'=>'form-control']) !!}
        @endforeach
    </div>
    <div>
        {!! Form::submit('Change',['class'=>'btn btn-success form-control']) !!}
    </div>
{!! Form::close() !!}
@endsection