<?php


$app = new App();

// -- route(nomLien, nomController, nomMethodeDuController)

// -- Connexion 
$app->route("connexion", "ConnexionController", "connexion");
$app->route("createAccount", "ConnexionController", "createAccount");

// -- Utilisator 
$app->route("utilisators", "UtilisatorController", "displayAllUtilisator");

// -- Question 
$app->route("questions", "QuestionController", "displayAllQuestion");
$app->route("question", "QuestionController", "displayOneQuestion");

$app->route("home", "SiteController", "index");




