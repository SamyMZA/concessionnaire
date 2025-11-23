<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ env('APP_NAME') }}</title>

    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />

    <!-- Dev client (facultatif si tu utilises HMR) -->
    {{--  <script src="http://localhost:8000"></script> --}}

    <!-- reCAPTCHA v2 (render=explicit obligatoire pour Vue) -->
    <script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>

    <style>
        body {
            background-color: hsl(193, 78%, 82%)
        }
    </style>
</head>

<body>

    @php
        $user_auth_data = Auth::check() ? ['isLoggedin' => true, 'user' => Auth::user()] : ['isLoggedin' => false];
    @endphp

    <script>
        window.Laravel = JSON.parse(atob('{{ base64_encode(json_encode($user_auth_data)) }}'));
    </script>

    <!-- Le conteneur Vue doit être vide -->
    <div id="app"></div>

    <!-- Le script Vue doit être chargé APRES -->
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>

</body>

</html>
