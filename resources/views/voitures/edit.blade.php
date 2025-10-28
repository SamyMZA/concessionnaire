
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<div class="container">
    <div class="row">
        <h2>@lang("general.modifier une voiture")</h2>

        <form method="POST" action="{{ url('admin/voitures/'. $voiture->id). '/update' }}"  enctype="multipart/form-data" >
            @method('PATCH')
            @csrf
            <p>Marque :</p> <input type="text" id="marque" name="marque" value="{{ $voiture->marque }}">
            <p>Modele :</p> <input type="text" id="modele" name="modele" value="{{ $voiture->modele }}">
            <p>Prix :</p> <input type="text" id="prix" name="prix" value="{{ $voiture->prix }}">
            <p>Image:</p> <input type = "file" name= "img"  id = "img"  accept="image/*">
            <button type="submit">@lang("general.modifier")</button>
        </form>
        <a href="{{ url('voitures/'.$voiture->id) }}">@lang("general.retour")</a>
    </div>
</div>


@endsection 