
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<div class="container">
    <div class="row">
        <h2>Ajouter une voiture</h2>

        <form action="{{ route('voitures.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>Marque :</p> <input type="text" id="marque" name="marque">
            <p>Modele :</p> <input type="text" id="modele" name="modele">
            <p>Prix :</p> <input type="text" id="prix" name="prix">
            <p>Image :</p> <input type = "file" name= "img"  class = "form-control">
            <button type="submit">Ajouter</button>
        </form>
        <a href="{{ url('/') }}">retour</a>
    </div>
</div>


@endsection 