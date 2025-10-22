
@extends('layouts.app')
@php $locale = session()->get('locale'); @endphp
    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<div class="container">
    <div class="row">
        <h2>@lang("general.ajouter voiture")</h2>

        <form action="{{ route('voitures.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <p>@lang("general.marque") :</p> <input type="text" id="marque" name="marque">
            <p>@lang("general.modele") :</p> <input type="text" id="modele" name="modele">
            <p>@lang("general.prix") :</p> <input type="text" id="prix" name="prix">
            <p>Image :</p> <input type = "file" name= "img"  class = "form-control">
            <button type="submit">@lang("general.ajouter")</button>
        </form>
        <a href="{{ url('/') }}">@lang("general.retour")</a>
    </div>
</div>


@endsection 