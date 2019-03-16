@extends('layouts.app')
@section('content')
    <table class="table table-striped">
        <thead>
        <th class="tt">Name</th>
        <th class="tt">Description</th>
        </thead>

        <tbody>



        @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>

            </tr>
        @endforeach


        </tbody>
    </table>
@endsection