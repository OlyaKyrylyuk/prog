@extends('layouts.app')
@section('content')

        <div class="all">
                <form method="post" action='/comments/create'>
            <input type="hidden" id="_token" value="{{csrf_token()}}">
            {!! csrf_field() !!}
            @foreach($post as $post)
            <div class="name"><h1>{{$post->name}}</h1></div>
            <div class="image"><img src="{{asset('/images/'.$post->file)}}"class="img-responsive"></div>
            <div class="content1"><h1 class="text-justify">{{$post->content}}</h1></div>
            <div class="comments">
                <tr>
                    <td><input type='text' id='author' name="author" class="form-control" placeholder="Input your name and surname"></td>
                    <td><input type='textarea' id='content' name="content"  class="form-control" placeholder="Input your comment" ></td>
                    <td><input type='hidden' id='post_id' name="post_id"  value="{{$post->id}}" class="form-control" ></td>
                    <td>
                            {{method_field('POST')}}
                            {!! Form::open(['url'=>'comments/create/'.$post->id]) !!}
                            {!! Form::submit('Add Comment',['id'=>'save','class'=>'form-control']) !!}
                       </td>
                    <h2>Comments</h2>
                    <table class="table table-striped ">
                        @foreach($comments as $comment)
                            <tbody>
                            <tr>

                                <td>{{ $comment->id }}</td>
                                <td>{{$comment->author}}</td>
                                <td>{{ $comment->content }}</td>
                            </tr>
                            @endforeach()
                            </tbody>
                    </table>
                </tr>

            </div>  @endforeach

                </form>


        <script>
            $(function() {
                $('#save').on('click',function(){
                    var author = $('#author').val();
                    var content = $('#content').val();
                    var post_id = $('#post_id').val();
                    var token = $('#_token').attr('content');
                    alert(author);
                    alert(content);
                    alert(post_id);
                    $.ajax({
                        url:  'comments/create',
                        method: "POST",
                        dataType: 'json',
                        data:{  "_method": 'POST',
                            "_token": token, author:author,content:content,post_id:post_id},
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