<?php
//Users
$tabUsers = [];
foreach ($datas['users'] as $user) {
    array_push($tabUsers, $user);
}
//Evenements
$tabEvents = [];
foreach ($datas['events'] as $event) {
    array_push($tabEvents, $event);
}

$tabBranches = [];
foreach ($datas['branches'] as $branche) {
    array_push($tabBranches, $branche);
}

$tabModules = [];
foreach ($datas['modules'] as $module) {
    array_push($tabModules, $module);
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
        //Evenements
        const tabEvents = <?php echo json_encode($tabEvents); ?>;
        const tabUsers = <?php echo json_encode($tabUsers); ?>;
        const tabBranches = <?php echo json_encode($tabBranches); ?>;
        const tabModules = <?php echo json_encode($tabModules); ?>;
    </script>


    <div id="app">

    </div>



    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>

<style>
    .buttons {

        position: flex;

    }
</style>