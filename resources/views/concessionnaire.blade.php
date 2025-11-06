<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ env('APP_NAME') }}</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
    <script src="http://localhost:8000"></script>
    <style>
        body {
            background-color: hsla(184, 100%, 79%, 1.00)
        }
    </style>
</head>

<body>

    @if (Auth::check())
        @php
            $user_auth_data=[
            'isLoggedin' => true,
            'user' => Auth::user(),
            ];
        @endphp
    @else
        @php
            $user_auth_data = [
            'isLoggedin' => false,
            ];
        @endphp
    @endif
    <div id="app">
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </div>
    <script>
        window.Laravel = JSON.parse(atob('{{ base64_encode(json_encode($user_auth_data)) }}'));
    </script>

</body>

</html>