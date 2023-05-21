<?php


$app = new App();

// -- route(nomLien, nomController, nomMethodeDuController)
$app->route("connexionUtilisator", "UtilisatorController", "connexionUtilisator");
$app->route("addUtilisator", "UtilisatorController", "addUtilisator");
$app->route("utilisators", "UtilisatorController", "displayAllUtilisator");

$app->route("home", "SiteController", "index");




