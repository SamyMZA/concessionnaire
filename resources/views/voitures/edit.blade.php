
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<div class="container">
    <div class="row">
        <h2>Modifier une voiture</h2>

        <form action="{{ route('voitures.update', $voiture->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <p>Marque :</p> <input type="text" id="marque" name="marque" value="{{ $voiture->marque }}">
            <p>Modele :</p> <input type="text" id="modele" name="modele" value="{{ $voiture->modele }}">
            <p>Prix :</p> <input type="text" id="prix" name="prix" value="{{ $voiture->prix }}">
            <p>Image :</p> <input type="text" id="img" name="img" value="{{ $voiture->img }}">
            <button type="submit">Modifier</button>
        </form>
        <a href="{{ url('voitures/'.$voiture->id) }}">retour</a>
    </div>
</div>


@endsection 