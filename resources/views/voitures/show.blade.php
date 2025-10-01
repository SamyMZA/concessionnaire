
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="container">
        <div class="show">
            <h2>voitures #{{$voiture->id}}</h2>
            <p>{{ $voiture->marque }}</p>
            <p>{{ $voiture->modele }}</p>
            <p>{{ $voiture->prix }} $</p>
            <img src="{{ $voiture->img }}" alt="">
        </div>
        <a href="{{ url("voitures/". $voiture->id . "/edit") }}">Modifier</a>
        
    </div>


@endsection 