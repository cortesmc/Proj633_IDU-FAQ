<?php

$data = null;

class UtilisatorController {

    
	// -- Afficher tous les livres
	public function displayAllUtilisator() {
		// -- DATA
		global $data;
		$data = Utilisator::all();	

		// -- VIEWS
		include_once "view/parts/header.php";
		include_once "view/utilisator/displayAllUtilisator.php";
		include_once "view/parts/footer.php";
	}

	public function addUtilisator() {
		if (isset($_POST["firstname"]) && 
			isset($_POST["lastname"])  &&
			isset($_POST["email"])	   &&
			isset($_POST["password"]))  {

			// -- Si l'adresse n'existe pas 
			if ( !Utilisator::checkIfEmailExist( $_POST["email"] )  || !Teacher::checkIfEmailExist( $_POST["email"] ) ) {

				// ---- TODO 
				// -- Check si l'adresse est un utilisator ou un prof

				// -- Si c'est un prof :
				$teacher = Teacher::create();
				$teacher->firstname = $_POST["firstname"];
				$teacher->lastname = $_POST["lastname"];
				$teacher->email = $_POST["email"];
				$teacher->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
				$teacher->save();

				// -- Si c'est un utilisateur :
				// $utilisator = Utilisator::create();
				// $utilisator->firstname = $_POST["firstname"];
				// $utilisator->lastname = $_POST["lastname"];
				// $utilisator->email = $_POST["email"];
				// $utilisator->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
				// $utilisator->save();
				

				header("Location: ?route=utilisators");	
			}
			

		} else {
			include_once "view/utilisator/addFormUtilisator.php";
		}
	}

	public function connexionUtilisator() {
		if (isset($_POST["email"])	  &&
			isset($_POST["password"]))  {

			// -- TODO : Regarder si le combo (email/pwd) existe dans la BDD
				// -> Si non : Mettre message d'erreur
				// -> Si oui envoyé à la route home
				// -> variable de session avec utilisateur connected $_SESSION["utilisator_conn"] = Utilisator::getByConnexion($email, $pwd)
				// -> variable de session avec utilisateur connected : ETU ou PROF

			$utilisator = Utilisator::create();
			$utilisator->email = $_POST["email"];
			$utilisator->password = $_POST["password"];
			// $utilisator->save();

            
			header("Location: ?route=home");			

		} else {
			include_once "view/utilisator/connexionFormUtilisator.php";
		}
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
