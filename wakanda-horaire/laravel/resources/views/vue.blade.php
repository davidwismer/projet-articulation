<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 Vue 3 - DevDuniya.com</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>

    <div id="app"></div>

    @foreach($users as $user)
    <h1>{{$user->nom}}</h1>
    @endforeach

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>