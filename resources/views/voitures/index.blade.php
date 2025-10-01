
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row1">
            <h2>Liste des voitures</h2>
            <a class="btn btn-success" href="{{ url('voitures/create') }}">Ajouter une voiture</a>
        </div>
    
    
        <div class="row2">
            @foreach ($voitures as $index => $voiture)
            <div class="cardVoiture">
                    <h2>
                        {{ $voiture->marque }}
                    </h2>
    
                    {{ $voiture->modele }}
                    <p>{{ $voiture->prix }} $</p>      
            </div>
            @endforeach
        </div>
    </div>


@endsection 