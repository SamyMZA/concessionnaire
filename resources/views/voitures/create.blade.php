@extends('layouts.app')


@section('content')

    <h1>Ajouter une voiture</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ url('voitures') }}" method="POST" enctype="multipart/form-data">
        @csrf
        

        <div class="form-group mb-3">
            <label for="marque">Marque:</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
        </div>


        <div class="form-group mb-3">

            <label for="content">Modele:</label>
            <input type="text" class="form-control" id="modele" placeholder="Entrez le modele" name="modele">
          </div>

           <div class="form-group mb-3">
            <label for="prix">Prix:</label>
            <input type="text" class="form-control" id="marque" placeholder="Entrez le prix" name="prix">
            {{--   <input type = "file" name= "img"> --}}
          <!--<input type="hidden" name="user_id" value="<?= 1?>" /><br /> -->
        </div>

        <button type="submit" class="btn btn-primary">Enregister</button>

    </form>

@endsection