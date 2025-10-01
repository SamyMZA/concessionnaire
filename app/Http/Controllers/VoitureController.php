<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('voitures.index', compact('voitures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voitures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
        'marque'=>'required',
        'modele'=>'required',
        'prix'=>'required',
        'img'=>'required',
        //'marque'=>'required |image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

          /*   if ($request->file('img')->isValid()) {
                $image = $request->file('img');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
              //  $path = $image->storeAs('images/upload', $fileName, 'public');
        
            } */


        $voiture = new voiture([
            'marque' => $request->get('marque'),
            'modele' => $request->get('modele'),
            'prix' => $request->get('prix'),
            'img' => $request->get('img'),
            'img' => $filename,
        ]);

        //dd($request);
        //$path = $request->file('img')->store('public/images');
        $voiture->save();
        return redirect('/')->with('success', 'voiture ajouté avec succès');

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
        //$achats = Achat::where('id_voiture', $id)->get();
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'marque'=>'required',
            'modele'=>'required',
            'prix'=>'required',
            //'img'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

         // if ($request->file('img')->isValid()) {
       /*      $image = $request->file('img');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images/upload', $fileName, 'public'); */
    
       // }
        //$file = $request->file('img');
    //if ($file = $request->haseFile('img')) 

    $voiture = voiture::findOrFail($id);
    $voiture->marque = $request->get('marque');
    $voiture->modele = $request->get('modele');
    $voiture->prix = $request->get('prix');
    //$voiture->img = $file->getClientOriginalName();

    $voiture->update();
    //$file->move("images", $file->getClientOriginalName());

    return redirect('/')->with('success', 'voiture modifié avec succès');
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
