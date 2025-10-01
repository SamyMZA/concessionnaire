@extends('layouts.app')


@section('content')


    <h1>Modifier voiture: {{ $voiture->marque }} {{ $voiture->modele }}</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form method="post" action="{{ url('voitures/'. $voiture->id) }}" >
        @method('PATCH')
        @csrf


        <div class="form-group mb-3">

            <label for="marque">Marque:</label>
            <textarea name="marque" id="marque" cols="30" rows="10" class="form-control">{{ $article->marque }}</textarea>

        </div>

        <div class="form-group mb-3">

            <label for="modele">Ajouter le modele:</label>
            <input type="text" class="form-control" id="modele" placeholder="Entrer le modele" name="modele" value="{{ $article->modele }}">

        </div>

        <div class="form-group mb-3">

            <label for="prix">Ajouter le prix:</label>
            <input type="text" class="form-control" id="prix" placeholder="100" name="prix" value="{{ $article->prix }}">

        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
       
            <a href="{{ url('voitures/'. $voiture->id) }}" class="btn btn-info">Annuler</a>  
    </form>
   
  
@endsection