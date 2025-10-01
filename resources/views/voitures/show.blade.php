@extends('layouts.app')


@section('modele')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $voiture->marque }} </h1>
            <p class="lead">{{ $voiture->modele }}</p>

            <div class="buttons">
                <a href="{{ url('voitures/'. $voiture->id .'/edit') }}" class="btn btn-info">Modifier</a>
                <a href="{{ url('/') }}" class="btn btn-info">Retour à la page d'accueil</a>  
                <form action="{{ url('voitures/'. $voiture->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

 {{-- Section des achats --}}
 <div class="container">   
   
    <h2> Les achats:</h2>
    @if ('success')
    <h6 class="alert alert-warning mb-3">{{'success'}}</h6>
@endif
    @foreach ($voiture->achats as $achat)
        <strong> Achat numéro {{$achat ->id}}</strong>
        <h2> Pour voiture numéro {{ $achat->id_voiture }}</h2>
     <div class="buttons">
     <form action="{{ url('achats/'. $achat->id) }}" method="POST" style="display: inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form>
</div>
    @endforeach
 {{-- Formulaire d'ajout d'achats --}}

<h4> Ajouter un achat:</h4>

  {{-- <form action="{{ url(url('voitures/'. $voiture->id). '/achats') }}" method="POST" enctype="multipart/form-data">  --}}
    <form action="{{route('achats.store')}}" method="POST" enctype="multipart/form-data"> 
  
        @csrf
        <div class="form-group mb-3">

            <label for="id_utilisateur">Écrivez votre user id:</label>
            <textarea name="id_utilisateur" id="id_utilisateur" cols="30" rows="10" class="form-control"></textarea>
         
            <input type="hidden" name="id_voiture" value="{{ $voiture->id}}" /><br /> 
            {{-- <input type="hidden" value="{{ $voiture->id}}">{{ $voiture->id }}/><br /> --}}
          </div>

        <button type="submit" class="btn btn-primary">acheter</button>
        @if ('success')
            <h6 class="alert alert-warning mb-3">{{'success'}}</h6>
        @endif
    </form>
@endsection