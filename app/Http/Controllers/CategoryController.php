<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Entry;
use App\Post;
use App\Comments_category;

class CategoryController extends Controller
{
    //вивести всі категорії
    public function index()

    {
        $categories=Category::all();
        return view('categories.index',['categories'=>$categories]);

    }

    //Додати дані до таблиці 'categories'
    public function create(Request $request)
    {
        $name=$request->get('name');
        $description=$request->get('description');
        $category= Category::create([
            'name'=>$name,
            'description'=>$description,

        ]);

        $category->save();
        return redirect()->action('EntryController@index');
        //$categories=Category::all();
        //return view('categories.index',['categories'=>$categories]);
    }
    public function editshow($id)
    {
       $category=Category::where('id',$id)->get();
       return view('categories.show',[
           'id'=>$id,
           'category'=>$category
       ]);
    }
    public function edit(Request $request,$id)
    {

        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->save();

        return redirect()->action('EntryController@index');
}
    public function delete($id)
    {

        $category= Category::find($id);
        $category->delete();
        return redirect()->action('EntryController@index');
    }
   public function posts($id)
   {
       $comments=Comments_category::where('category_id',$id)->get();
       $posts =  Post::where('category_id', $id)->get();
       $categories = Category::where('id',$id)->get();
       return view('categories.posts_category',[
           'posts'=>$posts,
           'categories'=>$categories,
           'comments'=>$comments
       ]);
   }
}
