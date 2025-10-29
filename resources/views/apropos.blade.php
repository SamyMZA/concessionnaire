@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <h2> {{ $message }} </h2>
        <br>
        <p>Samy Mizi Allaoua & Ulysse</p>
        <br>
        <p>420-5H6 MO Applications Web transactionnelles. Automne 2023, Collège Montmorency</p>
        <br>
        <p>On peut observer une voiture, acheter ou annuler l'achcat.  On peut s'inscrire ou se conecter.  Ajouter, modifier et supprimer une voiture</p>
        <p>
            Ce projet est une application web de concessionnaire automobile
            où les utilisateurs peuvent acheter une voiture après connexion.
            Les administrateurs ont la possibilité d'ajouter, modifier ou supprimer des véhicules.
        </p>
        <p>Insipier de nous meme :D</p>
        <br>
        <img src="{{asset('images/flag/img1.png')}}" width="450px">
    </div>
</div>
@endsection