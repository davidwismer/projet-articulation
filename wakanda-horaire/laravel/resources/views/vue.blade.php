<?php

$tabUsers = [];
foreach ($users as $user) {
    array_push($tabUsers, $user->nom);
}

$tabBranches = [];
foreach ($branches as $branche) {
    array_push($tabBranches, $branche);
}



?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 9 Vue 3 - DevDuniya.com</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>

    <script>

        const usersNoms = <?php echo json_encode($tabUsers); ?>;
        const userBranches = <?php echo json_encode($tabBranches); ?>;
        
    </script>


    <div id="app">

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>