@extends('layouts.app')
  
@section('content')

    <div class="row">

        <div class="col-lg-10">
            <h2>Liste des voitures</h2>
        </div>

        <div class="col-lg-2">
            <a class="btn btn-success" href="{{ url('voitures/create') }}">Ajouter une voitures</a>
        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif



<div class="container">

    <div class="row">
        @foreach ($voitures as $index => $voiture)
        <div class="col-md-4">
            <div class="card card-body">
            {{-- @if ($voiture->img)
               <img src="../images/upload/{{$voiture->img}}"width="200px" height="100px"> >
            @endif --}}
                <a href="{{ url('voitures/'. $voiture->id) }}">
                <h2>
                        {{ $voiture->marque }}
                    </h2>
                   
                </a>
                {{ $voiture->modele }}
                          
            <a href="{{ url('voitures/'. $voiture->id) }}" class="btn btn-outline-primary">En savoir plus</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection 