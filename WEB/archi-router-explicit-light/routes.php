<?php


$app = new App();

// -- route(nomLien, nomController, nomMethodeDuController)
$app->route("home", "SiteController", "index");
$app->route("utilisators", "UtilisatorController", "displayAllUtilisator");
$app->route("addUtilisator", "UtilisatorController", "addUtilisator");




