<?php


$app = new App();

// -- route(nomLien, nomController, nomMethodeDuController)
$app->route("connexion", "ConnexionController", "connexion");
$app->route("createAccount", "ConnexionController", "createAccount");
$app->route("utilisators", "UtilisatorController", "displayAllUtilisator");

$app->route("home", "SiteController", "index");




