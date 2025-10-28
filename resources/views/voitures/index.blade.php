
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="container">
        @if (Auth::user() && Auth::user()->role === 'ADMIN')
        <div class="row1">
            <h2>@lang("general.liste voitures")</h2>
            <a href="{{ url('voitures/create') }}">@lang("general.ajouter voiture")</a>
        </div>
        @endif
    
        <a href="{{ route('achats.index') }}">@lang("general.liste achats")</a>
        
        <div class="row2">
            @foreach ($voitures as $index => $voiture)
                @if ($voiture->dispo == 1)
                    <div class="cardVoiture">
                        <a href="{{ url('voitures/'. $voiture->id) }}">
                            @if ($voiture->img)
                                <img height="200px" width="300px" src="{{ asset('storage/images/upload/'.$voiture->img) }}" >
                            @endif
                        </a>
                        <p>{{ $voiture->marque }}</p>
                        <p>{{ $voiture->modele }}</p>
                        <p>{{ $voiture->prix }} $</p>

                    </div>  
                @endif
            @endforeach
        </div>
        
    </div>


@endsection 