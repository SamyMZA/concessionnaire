@extends('layouts.app')


@section('content')

    <h1>Ajouter un commentaire</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    {{-- <form action="{{ url(url('voitures/'. $voiture->id). '/achats') }}" method="POST" enctype="multipart/form-data"> --}}
        <form action="{{route('achats.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="form-group mb-3">

            <label for="id_utilisateur">Écrivez votre user id:</label>
            <textarea name="id_utilisateur" id="id_utilisateur" cols="30" rows="10" class="form-control"></textarea>
         
            <input type="hidden" name="id_voiture" value="{{ $voiture->id}}" /><br /> 
            {{-- <input type="hidden" value="{{ $voiture->id}}">{{ $voiture->id }}/><br /> --}}
          </div>

        <button type="submit" class="btn btn-primary">acheter</button>

    </form>
@endsection