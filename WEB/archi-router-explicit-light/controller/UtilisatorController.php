<?php

$data = null;

class UtilisatorController {

    
	public function displayAllUtilisator() {
		// -- DATA
		global $data;
		$data = Utilisator::all();	

		// -- VIEWS
		include_once "view/parts/header.php";
		include_once "view/utilisator/displayAllUtilisator.php";
		include_once "view/parts/footer.php";
	}

}

	// ----------- BROUILLON
	// public function add() {
	// 	if (isset($_GET["namebrassery"]) && 
	// 		isset($_GET["country"])) {

	// 		$brassery = Brassery::create();
	// 		$brassery->namebrassery = $_GET["namebrassery"];
	// 		$brassery->country = $_GET["country"];
	// 		$brassery->save();

    //         // var_dump($brassery);

	// 		header("Location: ?route=brassery");			

	// 	} else {
	// 		include_once "view/header.php";
	// 		include_once "view/addFormBrassery.php";
	// 		include_once "view/footer.php";
	// 	}
	// }


	// public function single() {
	// 	global $data;
	// 	$data = Brassery::getByID($_GET["id"]);
	// 	include_once "view/header.php";
	// 	include_once "view/singleBrassery.php";
	// 	include_once "view/footer.php";
	// }
