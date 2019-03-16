<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Comments_category;

class CommentsCategoryController extends Controller
{
    public function create(Request $request)
    {
        $author = $request->get('author');
        $content=$request->get('content');
        $category_id=$request->get('category_id');
        $now= Carbon::now();
        $comment = new Comments_category;
        $comment->author = ucwords($author);
        $comment->content= $content;
        $comment->category_id= $category_id;
        $comment->created_at = $now;
        $comment->updated_at = $now;
        $comment->save();
        return redirect()->action('EntryController@index');
    }
}
