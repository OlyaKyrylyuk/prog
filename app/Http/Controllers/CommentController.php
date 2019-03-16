<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Comment;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        $author = $request->get('author');
        $content=$request->get('content');
        $post_id=$request->get('post_id');
        $now= Carbon::now();
        $comment = new Comment;
        $comment->author = ucwords($author);
        $comment->content= $content;
        $comment->post_id= $post_id;
        $comment->created_at = $now;
        $comment->updated_at = $now;
        $comment->save();
        return redirect()->action('PostController@index');
    }}
