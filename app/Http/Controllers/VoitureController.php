<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use Illuminate\Support\Facades\Validator;


class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voitures = Voiture::all();
        return view("voitures.index", compact("voitures"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("voitures.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'marque' => 'required',
            'modele' => 'required',
            'prix' => 'required',
            'img' => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('warning','Tous les champs sont requis');   
        }
        else{
            Voiture::create($request->all());       
            return redirect('/')->with('success', 'voiture Ajouté avec succès');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voiture = Voiture::findOrFail($id);
        return view('voitures.show', compact('voiture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voiture = Voiture::findOrFail($id);
        return view('voitures.edit', compact('voiture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voiture $voiture)
    {
        $validator = Validator::make($request->all(),[
            'marque' => 'required',
            'modele' => 'required',
            'prix' => 'required',
            'img' => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('warning','Tous les champs sont requis');   
        }
        else{
            $voiture->update($request->all());       
            return redirect('/')->with( 'success', 'voiture Ajouté avec succès');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voiture = Voiture::findOrFail($id);
        $voiture->delete();
        return redirect('/')->with('success', 'voiture supprimé avec succès');
    }
}
