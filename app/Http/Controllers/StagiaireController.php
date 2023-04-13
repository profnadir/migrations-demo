<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StagiaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$stagiaires = Stagiaire::all();
        $stagiaires = DB::table('stagiaires')->get();
        $moy = DB::table('stagiaires')->where('id','=',1)->select('age as test','nom')->get();
        return view('stagiaires.index', compact('stagiaires','moy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stagiaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation

        /* $stagiaire = new Stagiaire();

        $stagiaire->nom = $request->nom;
        $stagiaire->prenom = $request->prenom;
        $stagiaire->age = $request->age;

        $stagiaire->save(); */

        $data = DB::table('stagiaires')->insertGetId([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
        ]);

        // insert <- true/false
        // insertGetId <- last id

        //dd($data);

        return redirect()->route('stagiaires.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function show(Stagiaire $stagiaire)
    {
        //DB::table('stagiaires')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Stagiaire $stagiaire)
    {
        return view('stagiaires.edit',compact('stagiaire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        // validation

        DB::table('stagiaires')
        ->where('id','=',$stagiaire->id)
        ->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
        ]);

        return redirect()->route('stagiaires.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stagiaire $stagiaire)
    {
        DB::table('stagiaires')
        ->where('id','=',$stagiaire->id)
        ->delete();

        return redirect()->route('stagiaires.index');

    }
}
