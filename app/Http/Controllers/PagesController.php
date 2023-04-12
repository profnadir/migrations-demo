<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        //$posts = Post::orderBy('description')->take(2)->get();
        //$posts = Post::where('title','=','test')->get();
        $posts = Post::all();
        //dd($posts);
        return view('welcome', compact('posts'));
    }
}
