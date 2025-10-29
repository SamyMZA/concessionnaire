
@extends('layouts.app')

    
@section('content')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row1">
            <h2>@lang('general.liste voitures')</h2>
        </div>

        
        <div class="row2">
            @foreach ($achats as $index => $achat)
                    <div class="cardVoiture">
                        <p>{{ $achat->utilisateur->nom }} @lang("general.achateurs") {{ $achat->voiture->marque }}</p>
                        <form method="post"  action="{{ url('achats/'. $achat->id) }}">
                            @csrf
                            @method('DELETE')
                            <button>Annuler</button>
                        </form>
                    </div>  
            @endforeach
        </div>
        
    </div>


@endsection 