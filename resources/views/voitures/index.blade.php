
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row1">
            <h2>Liste des voitures</h2>
            <a href="{{ url('voitures/create') }}">Ajouter une voiture</a>
        </div>
    
    
        
        <div class="row2">
            @foreach ($voitures as $index => $voiture)
            <div class="cardVoiture">
                    <a href="{{ url('voitures/'. $voiture->id) }}"><h2>
                        {{ $voiture->marque }}
                    </h2></a>

                    <p>{{ $voiture->modele }}</p>
                    <p>{{ $voiture->prix }} $</p>
                    <img height="200px" width="300px" src="{{ $voiture->img }}" alt="">    

            </div>
            @endforeach
        </div>
        
    </div>


@endsection 