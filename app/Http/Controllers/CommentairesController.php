<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation 

       /*  Commentaire::create([
            'message' => $request->message,
            'post_id' => $request->post_id
        ]);  */


        //doc

        $post = Post::findOrFail($request->post_id);

        //save
        /* $post->commentaires()->save(
            new Commentaire([
                'message' => $request->message
            ])
        ); */

        //Post::where('content','like','code%')->get();

        //create
        $post->commentaires()->create(
            [
                'message' => $request->message
            ]
        );

        // save many 
       /*  $post->commentaires()->saveMany([
            new Commentaire([
                'message' => $request->message
            ]),
            new Commentaire([
                'message' => $request->message
            ]),
            new Commentaire([
                'message' => $request->message
            ])
        ]
            
        ); */

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
