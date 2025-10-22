
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="container">
        <div class="show">
            <h2>@lang("general.voiture") #{{$voiture->id}}</h2>
            @if($voiture->img)
                <img height="200px" width="300px" src="{{ asset('storage/images/upload/'.$voiture->img) }}" >
            @endif

            <p>{{ $voiture->marque }}</p>
            <p>{{ $voiture->modele }}</p>
            <p>{{ $voiture->prix }} $</p>
        </div>

        <a href="{{ url('voitures/'. $voiture->id . '/edit') }}">@lang("general.modifier")</a>

            <form method="post" action="{{ url('voitures/'. $voiture->id) }}" >
            @csrf
            @method('DELETE')
                <button type="submit">@lang("general.supprimer")</button>
           </form>


            <form action="{{ route('achats.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id_utilisateur" value="1" >
                <input type="hidden" name="id_voiture" value="{{ $voiture->id }}">
                {{ $voiture->dispo == 0 }}
            <button type="submit">@lang("general.acheter")</button>
            </form>
    </div>


@endsection 