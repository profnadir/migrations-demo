<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::where('user_id','=',auth()->id())->get();

        $posts = auth()->user()->posts;

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $p = new Post();

        //validation is required

        $p->title = $request->title;
        $p->description = $request->description;
        $p->user_id = auth()->id();

        $p->save(); */

        $post=Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);

        $categories = $request->input('categories', []);//[1,2,3]
        $post->categories()->sync($categories);

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::withCount('commentaires')->findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //validation

        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        $categories = $request->input('categories', []);
        $post->categories()->sync($categories);

        return redirect(route('posts.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        //Post::destroy($post->id);
    }
}
