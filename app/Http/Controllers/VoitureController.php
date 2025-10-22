<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voiture;
use App\Models\Achat;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
     * @return \Illuminate\Http\
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
            'img' => 'required |image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->file('img')->isValid()) {
                $image = $request->file('img');
                $fileName = time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('images/upload', $fileName, 'public');
        }

        if($validator->fails())
        {
            return redirect()->back()->with('warning','Tous les champs sont requis');   
        }
        else{
            //Voiture::create($request->all());       
            Voiture::create([
                'marque' =>$request ->input('marque'),
                'modele' =>$request ->input('modele'),
                'prix' =>$request ->input('prix'),
                'img' =>$fileName,
            ]);

            return redirect('/')->with('success', 'voiture ajouté avec succès');
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
            'img'=> 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
 
        if($validator->fails())
        {
            return redirect()->back()->with('warning','Tous les champs sont requis');  
        }
 
        if ($request->file('img')->isValid()){
           
            $path = 'public/images/upload/'.$voiture->img;
            Storage::delete($path);
 
            $destination = 'public/images/upload/'.$voiture->img;
 
            if(File::exists($destination))
            {
                File::delete($destination);
            }
           
            $image = $request->file('img');
            $fileName = time().'.'.$image->getClientOriginalExtension();
           
            $image->storeAs('public/images/upload/', $fileName);
 
            $voiture->img = $fileName;
        }
 
        $voiture->update();      
        return redirect('/')->with( 'success', 'voiture Ajouté avec succès');
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
        $path = 'public/images/upload/'.$voiture->img;
        Storage::delete($path);
        $voiture->delete();
        return redirect('/')->with('success', 'voiture supprimé avec succès');
    }

    public function autocomplete(Request $request)
    {
        $search = $request->search;
        $voitures = Voiture::orderby('marque','asc')
                    ->select('id','marque')
                    ->where('marque', 'LIKE', '%'.$search. '%')
                    ->get();
                    $response = array();
                    foreach($voitures as $voiture){
                        $response[] = array(
                            'value' => $voiture->id,
                            'label' => $voiture->marque
                        );
                    }
                    /* $utilisateurs = Utilisateur::orderby('nom','asc')
                    ->select('id','nom')
                    ->where('nom', 'LIKE', '%'.$search. '%')
                    ->get();
                    $response = array();
                    foreach($utilisateurs as $utilisateur){
                        $response[] = array(
                            'value' => $utilisateur->id,
                            'label' => $utilisateur->nom
                        );
                    }
 */

        return response()->json($response);
    } 
}
