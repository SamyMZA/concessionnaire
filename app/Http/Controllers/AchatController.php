<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achats = Achat::all();
        return view("achats.index", compact("achats"));
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
        $validator = Validator::make($request->all(), [
            'id_utilisateur' => 'required',
            'id_voiture' => 'required',
        ]);
        if($validator->fails())
        {
            return redirect()->back()->with('warning','Tous les champs sont requis');   
        }
        else{
            // Achat::create(attributes: $request->all());

            $achat = Achat::create($request->all());


            $voiture = $achat->voiture; // relation Eloquent
            $voiture->dispo = 0;
            $voiture->save();
            return redirect('/')->with('success', 'Achat Ajouté avec succès');
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
        $achat = Achat::findOrFail($id);
        
        $voiture = $achat->voiture; // relation Eloquent
        $voiture->dispo = 1;
        $voiture->save();


        $achat->delete();

        return redirect()->back();
    }
}
