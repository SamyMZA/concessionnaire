@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <h2> {{ $message }} </h2>
        <br>
        <p>Samy Mizi Allaoua & Marshlee Ulysse</p>
        <br>
        <p>420-5H6 MO Applications Web transactionnelles, Automne 2025</p>
        <br>
        <p>Un utilisateur non connecté peux voire la liste des voitures disponibles. Pour pouvoir ajouter, supprimer, ou modifier une voiture, l'utilisateur va devoir se connecté ou se créer un compte
          si ce n'est pas encore créer. En cliquant sur connexion, l'utilisateur va être diriger soi à la page de connexion s'il ou elle a un compte ou la page de création de compte. Pour se créer un compte
          l'utilisateur doit fournir un nom, un mot de passe (et le confirmer), un email et répondre au captcha. Une fois fait, l'utilisateur sera invité à confirmer la création du compte à travers un courriel
          envoyé. Une fois connectée, l'utilisateur à accès à divers options: Ajouter une voiture, supprimer ou modifier sa ou ses voitures après avoir cliquer sur celle-ci et voir la liste des acheteurs.
        </p>
        <br>
        <img src="{{asset('images/flag/img1.png')}}" width="450px">
    </div>
</div>
@endsection