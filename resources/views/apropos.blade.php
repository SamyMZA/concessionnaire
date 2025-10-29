@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <h2> {{ $message }} </h2>
        <br>
        <p>Samy Mizi Allaoua & Marshlee Ulysse</p>
        <br>
        <p>420-5H6 MO Applications Web transactionnelles. Automne 2023, Collège Montmorency</p>
        <br>
        <p>Les actions de bases que nous pouvons faire sont ajouter une voiture, acheter une voiture, visioner les informations sur une voiture spécifique et
            voir une liste de tous les achats déjà effectués. Un utilisateur qui n'est pas connecté ne peut seulement voir la liste des voitures, les informations
            sur une voiture spécifique et voir la liste des acheteurs (avec succès). Seulement admin peut ajouter une voiture et modifier ou supprimer la voiture
            créée (succès). Un utilisateur peut s'inscrire au site (résultat mixe) ou se connecté s'il possède déjà un compte (mixe). Toutes utilisateurs peuvent changer
            la langue du site et ce sur n'importe quel page actuel (succès). L'utilisateur peut utiliser la barre de recherche pour vérifier si une voiture existe
            en recherchant le nom de la marque sur la page d'acceuil(succès).
        </p>
        <br>
        <p>Insipier de nous meme :D</p>
        <br>
        <img src="{{asset('images/flag/img1.png')}}" width="450px">
    </div>
</div>
@endsection