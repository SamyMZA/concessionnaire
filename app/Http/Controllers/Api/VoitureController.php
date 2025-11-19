<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
        return view("voitures.index", compact("voitures"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voiture = $request->all();

        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'prix' => 'required',
            'img'=> 'required|image',
        ]);

        if ($voiture = $request ->file('img')){
            $image = $request->img;
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $path = $image->move('images/upload', $fileName,'public');
        }

            $voiture = Voiture::create([
                'marque'=> $request->input('marque'),
                'modele'=> $request->input('modele'),
                'prix'=> $request->input('prix'),
                'img'=> $fileName, 
            ]);       
            return response()->json([$voiture, "message" => "Voiture ajouté"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //$voiture = Voiture::findOrFail($id);
        //return view('voitures.show', compact('voiture'));
        return Voiture::find($id);
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
        {

        $voiture = Voiture::findOrFail($id);

        $validator = Validator::make($request->all(),[
            'marque' => 'required',
            'modele' => 'required',
            'prix' => 'required',
            'img'=> 'required|image',
        ]);

        if ($validator->fails()) {
            return response() ->json(['success' => false, 'message' => $validator->errors()], 400);
        }


        if ($request->file('img')->isValid()){

            $destination = 'storage/images/upload/'.$voiture->img;
            
            $image = $request->file('img');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images/upload/', $fileName);
            $voiture->img = $fileName;
        }

        $voiture->marque = $request->input('marque');
        $voiture->modele = $request->input('modele');
        $voiture->prix = $request->input('prix');

        $voiture->update();       
        return response()->json([$voiture,"message" => "Voiture modifé avec succée" ] );
   
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
        $path = 'public/images/upload/'.$voiture->img;
        
        if ($voiture != null ) {
            Storage::delete($path);

            $voiture->delete();
            return response()->json(null, 204);
        }else{
            return response()->json(["message" => "Voiture modifé avec succée" ] );
        } 
        
    }

    public function autocomplete(Request $request){
        $query = $request->input('query');
        $voitures = Voiture::where('marque', 'LIKE', "%{$query}%")->limit(10)->get();
        return response()->json($voitures);
    }
}
