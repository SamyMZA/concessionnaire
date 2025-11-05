<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @if (Auth::check())
        @php
            $user_auth_data=[
                'isLoggedin' => true,
                'user' => Auth::user(),
            ];
        @endphp 
    @endif
@else
    @php
        $user_auth_data = [
            'isLoggedin' => false,
];
    @endphp
    
<script>
    window.Laravel = JSON.parse(atob('{{ base64_encode(json_encode($user_auth_data)) }}'));
</script>

</body>
</html>