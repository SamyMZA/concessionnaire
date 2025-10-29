
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<div class="container">
    <div class="row">
        <h2>@lang("general.modifier une voiture")</h2>

        <form method="POST" action="{{ url('admin/voitures/'. $voiture->id). '/update' }}"  enctype="multipart/form-data" >
            @method('PATCH')
            @csrf
            <p>@lang('general.marque') :</p> <input type="text" id="marque" name="marque" value="{{ $voiture->marque }}">
            <p>@lang('general.modele') :</p> <input type="text" id="modele" name="modele" value="{{ $voiture->modele }}">
            <p>@lang('general.prix') :</p> <input type="text" id="prix" name="prix" value="{{ $voiture->prix }}">
            <p>image:</p> <input type = "file" name= "img"  id = "img"  accept="image/*">
            <button type="submit">@lang("general.modifier")</button>
        </form>
        <a href="{{ url('voitures/'.$voiture->id) }}">@lang("general.retour")</a>
    </div>
</div>


@endsection 