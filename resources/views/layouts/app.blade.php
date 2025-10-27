@php $locale = session()->get('locale'); @endphp
<!doctype html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
<html lang="fr">

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
        <a href="/">
            <h1>Concessionnaire</h1>
        </a>
    </div>

    <div class="car-body">
        <form>
            @csrf
            <div class="form-group">
                <input type="text" class="typeahead form-control" id="voiture_search" placeholder="Rechercher...">
            </div>
        </form>
        <a class="navbar-brand" href="{{ route('home') }}"> Accueil</a>
        @if (Auth::user())
        @if (Auth::user()->role === 'USER')
        <a class="navbar-brand" href=>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
            @endif
            @endif
            <script type="text/javascript">
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $(document).ready(function() {
                    $('#voiture_search').autocomplete({
                        source: function(request, response) {
                            $.ajax({
                                url: "{{route('autocomplete')}}",
                                type: 'POST',
                                dataType: "json",
                                data: {
                                    _token: CSRF_TOKEN,
                                    search: request.term
                                },
                                success: function(data) {
                                    response(data);
                                }
                            });
                        },
                        select: function(event, ui) {
                            $('#voiture_search').val(ui.item.label);
                            
                            return false;
                        }
                    });
                });
            </script>
    </div>
    {{-- Section multilingue --}}
    <ul class="navbar-nav ms-auto">
        @php $locale = session()->get('locale'); @endphp
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @switch($locale)
                @case('en')
                <img src="{{asset('images/flag/en.png')}}" width="25px"> English
                @break
                @case('fr')
                <img src="{{asset('images/flag/fr.png')}}" width="25px"> Français
                @break
                @default
                <img src="{{asset('images/flag/en.png')}}" width="25px"> English
                @endswitch
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="lang/en"><img src="{{asset('images/flag/en.png')}}" width="25px"> English</a>
                <a class="dropdown-item" href="lang/fr"><img src="{{asset('images/flag/fr.png')}}" width="25px"> Français</a>
            </div>
        </li>
    </ul>
    <ul class="navbar-nav ms-auto">
        <!-- Authentication Links -->

        @if (Auth::user()) {{-- accées au boutons d"enregistrement de connéexion et de déconnexion peu importe le rôle de l'utilisateur authentifié --}}
        @if (Auth::user()->role === 'ADMIN')
        {{-- Accées à l'espace admin Juste pour les ADMIN --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}"> Espace Admin</a>
        </li>
        @endif
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @else
        <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
        <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>

        @endif
    </ul>
    <main class="py-4">
        @yield('content')
    </main>
    </div>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.js') }}"></script>

</body>

</html>