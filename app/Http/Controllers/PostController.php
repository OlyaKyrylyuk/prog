<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
use File;
use Image;
use App\Category;
use App\Comment;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->select('posts.id', 'posts.name', 'posts.content','posts.file','categories.name as name2')
            ->get();
        return view('posts.index',[
            'posts'=>$posts,

        ]);
    }
    public function create(Request $request)
    {

        if($request->hasFile('file'))
        {

                $name=$request->get('name');
                $content = $request->get('content');
                $category_id=$request->get('category_id');
                $image=$request->file('file');
                $filename = time() .'.'.$image->getClientOriginalExtension();
                $location = public_path('images/'.$filename);
                Image::make($image)->resize(800,400)->save($location);
                $post= Post::create([
                    'name'=>$name,
                    'content'=>$content,
                    'file'=>$filename,
                    'category_id'=>$category_id

                ]);
                $post->save();
                return redirect()->action('PostController@index');


        }
    }
    public function form_add()
    {
        $categories=Category::all();
        return view('posts.add_post',[
            'categories'=>$categories
        ]);
    }
    public function view($id)
    {
        $comments=Comment::where('post_id',$id)->get();
        $post=Post::where('id',$id)->get();
        return view('posts.view',[
            'post'=>$post,
            'comments'=>$comments
        ]);
    }
    public function delete($id)
    {
        $post= Post::find($id);
        $post->delete();
        return redirect()->action('PostController@index');

    }
    public function edit($id)
    {
        $categories=Category::all();
        $post=Post::where('id',$id)->get();
        return view('posts.edit_post',[
            'categories'=>$categories,
            'post'=>$post,
            'id'=>$id
        ]);
    }
    public function editdata($id,Request $request)
    {
        if($request->hasFile('file'))
        {
            $image=$request->file('file');
            $filename = time() .'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $post= Post::find($id);
            $post->name = $request->get('name');
            $post->content = $request->get('content');
            $post->file = $filename;
            $post->category_id=$request->get('category_id');
            $post->save();

            return redirect()->action('PostController@index');


        }
        return '';
    }
}
