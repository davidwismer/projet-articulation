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

$tabNotes = [];
foreach ($datas['notes'] as $note) {
    array_push($tabNotes, $note);
}

$tabCours = [];
foreach ($datas['cours'] as $cours) {
    array_push($tabCours, $cours);
}

$tabAbsences = [];
foreach ($datas['absences'] as $absence) {
    array_push($tabAbsences, $absence);
}

$tabCommentaires = [];
foreach ($datas['commentaires'] as $commentaire) {
    array_push($tabCommentaires, $commentaire);
}

$tabFilieres = [];
foreach ($datas['filieres'] as $filiere) {
    array_push($tabFilieres, $filiere);
}

$tabClasses = [];
foreach ($datas['classes'] as $classe) {
    array_push($tabClasses, $classe);
}

$tabRoles = [];
foreach ($datas['roles'] as $role) {
    array_push($tabRoles, $role);
}

$tabFiliereModule = [];
foreach ($datas['filiere_module'] as $filiereModule) {
    array_push($tabFiliereModule, $filiereModule);
}

$tabModuleUser = [];
foreach ($datas['module_user'] as $moduleUser) {
    array_push($tabModuleUser, $moduleUser);
}

$tabBrancheUser = [];
foreach ($datas['branche_user'] as $brancheUser) {
    array_push($tabBrancheUser, $brancheUser);
}

$tabRendus = [];
foreach ($datas['rendus'] as $rendu) {
    array_push($tabRendus, $rendu);
}

$tabNotifications = [];
foreach ($datas['notifications'] as $notification) {
    array_push($tabNotifications, $notification);
}
?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wakanda Horaire</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>


<body>

    <script>
        const tabEvents = <?php echo json_encode($tabEvents); ?>;
        const tabUsers = <?php echo json_encode($tabUsers); ?>;
        const tabBranches = <?php echo json_encode($tabBranches); ?>;
        const tabModules = <?php echo json_encode($tabModules); ?>;
        const tabNotes = <?php echo json_encode($tabNotes); ?>;
        const tabCours = <?php echo json_encode($tabCours); ?>;
        const tabAbsences = <?php echo json_encode($tabAbsences); ?>;
        const tabCommentaires = <?php echo json_encode($tabCommentaires); ?>;
        const tabFilieres = <?php echo json_encode($tabFilieres); ?>;
        const tabClasses = <?php echo json_encode($tabClasses); ?>;
        const tabRoles = <?php echo json_encode($tabRoles); ?>;
        const tabFiliereModule = <?php echo json_encode($tabFiliereModule); ?>;
        const tabModuleUser = <?php echo json_encode($tabModuleUser); ?>;
        const tabBrancheUser = <?php echo json_encode($tabBrancheUser); ?>;
        const tabRendus = <?php echo json_encode($tabRendus); ?>;
        const tabNotifications = <?php echo json_encode($tabNotifications); ?>;
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