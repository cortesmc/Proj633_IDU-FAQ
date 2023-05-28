<?php


// ---- CHARGER TOUS LES FICHIER AUTOMATIQUEMENT :
spl_autoload_register(function ($class) {
	if (strpos($class, "Controller") !== false ||  $class == 'App')
		include_once "controller/".$class.".php";
    else
		include_once "model/".$class.".php";
});


// ---- CONNEXION DE BASE DE DONNÉES :
try
{
	$db = new PDO("mysql:host=tp-epua:3308;dbname=lebonmat;","lebonmat","yxr5ryhf");
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


function db() { global $db; return $db; }


session_start();






