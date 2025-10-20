
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row1">
            <h2>Liste des voitures</h2>
            <a href="{{ url('voitures/create') }}">Ajouter une voiture</a>
        </div>
    
        <a href="{{ route("achats.index") }}">Liste des achats</a>
        
        <div class="row2">
            @foreach ($voitures as $index => $voiture)
                @if ($voiture->dispo == 1)
                    <div class="cardVoiture">
                        <a href="{{ url('voitures/'. $voiture->id) }}"><h2>
                            @if ($voiture->img)
                                <img height="200px" width="300px" src="{{ asset('storage/images/upload/'.$voiture->img) }}" > 
                            @endif

                        </h2></a>

                        <p>{{ $voiture->marque }}</p>
                        <p>{{ $voiture->modele }}</p>
                        <p>{{ $voiture->prix }} $</p>

                    </div>  
                @endif
            @endforeach
        </div>
        
    </div>


@endsection 