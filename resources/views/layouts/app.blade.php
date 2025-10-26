<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- JQuery -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>
<body>

    <div class="nav">
        <a href="/"><h1>Concessionnaire</h1></a>
    </div>

    <div class="car-body">
        <form>
            @csrf
            <div class="form-group">
                <input type="text" class="typeahead form-control"  id = "voiture_search" placeholder = "Rechercher..." > 
            </div>
        </form>
        <script type="text/javascript">
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(document ).ready(function(){
            $('#voiture_search').autocomplete({  
                source:function( request, response ) {
                $.ajax({
                url:"{{route('autocomplete')}}",
                type: 'POST',
                dataType: "json",
                    data: {
                    _token: CSRF_TOKEN,
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }    
                    }); 
                },
                select: function (event, ui) {
                $('#voiture_search').val(ui.item.label);

                window.location.href = "/voitures/" + ui.item.valeur;

                return false;
                }
            });
                });
        </script>
    </div>

    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.js') }}"></script>

</body>
</html>
