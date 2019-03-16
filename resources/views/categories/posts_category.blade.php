@extends('layouts.app')
@section('content')
    <table class="table table-striped ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Content</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>

                <td>{{ $post->id }}</td>
                <td>{{$post->name}}</td>
                <td>{{ $post->content }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
    @foreach($categories as $category)
    <form method="post" action='/comments_category/create/'>
    <div class="comments">
        <tr>

            <td><input type='text' id='author' name="author" class="form-control" placeholder="Input your name and surname"></td>
            <td><input type='textarea' id='content' name="content"  class="form-control" placeholder="Input your comment" ></td>
            <td><input type='hidden' id='category_id' name="category_id"  value="{{$category->id}}" class="form-control" ></td>
            <td>
                {{method_field('POST')}}
                {!! Form::open(['url'=>'comments_category/create/']) !!}
                {!! Form::submit('Add Comment',['id'=>'save','class'=>'form-control']) !!}
            </td>
                @endforeach
    </div>
        <h2>Comments</h2>
        <table class="table table-striped ">
            @foreach($comments as $comment)
                <tbody>
                <tr>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->content}}</td>
                </tr>@endforeach()
                </tbody>
        </table>
        </tr>
    </div>
    </form>

    <script>
        $(function() {
            $('#save').on('click',function(){
                var author = $('#author').val();
                var content = $('#content').val();
                var category_id = $('#category_id').val();
                var token = $('#_token').attr('content');
                $.ajax({
                    url:  'comments_category/create',
                    method: "POST",
                    dataType: 'json',
                    data:{  "_method": 'POST',
                        "_token": token, author:author,content:content,category_id:category_id},
                    headers: {

                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')

                    },
                    success: function (data) {
                        console.log(name);
                        window.location.reload();
                    },

                    error: function (msg) {
                    }
                });

            });
        })

    </script>
@endsection