<?php

namespace App\Http\Controllers;

use Request;
use App\Category;
use App\Entry;
use Carbon\Carbon;
use DB;



class EntryController extends Controller
{
    public function index2(Request $request){


    }

    public function index(Request $request)
    {
        $user_agent = $_SERVER["HTTP_USER_AGENT"];
        if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
        elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
        elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
        else $browser = "This browser isn't famous";

        $entry = new Entry;
        $entry->ip=Request::ip();
        $entry->browser = $browser;
        $entry->created_at = Carbon::now();
        $entry->updated_at = Carbon::now();
        $entry->save();

        $chrome = DB::table('entries')->where('browser','Chrome')->count();
        $opera = DB::table('entries')->where('browser','Opera')->count();
        $firefox = DB::table('entries')->where('browser','Firefox')->count();

        $entry=Entry::all();
        $categories = Category::all();

        return view('welcome',[
            'categories' => $categories,
            'entries'=>$entry,
            'chrome'=>$chrome,
            'opera'=>$opera,
            'firefox'=>$firefox
        ]);


    }


}
