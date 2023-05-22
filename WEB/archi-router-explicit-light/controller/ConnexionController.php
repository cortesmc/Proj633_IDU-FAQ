<?php

$data = null;

class ConnexionController {


	public function createAccount() {
		if (isset($_POST["firstname"]) && 
			isset($_POST["lastname"])  &&
			isset($_POST["email"])	   &&
			isset($_POST["password"]))  {

			// -- Si l'adresse n'existe pas 
			if ( !Utilisator::checkIfEmailExist( $_POST["email"] )  || !Teacher::checkIfEmailExist( $_POST["email"] ) ) {

				$email = $_POST["email"];
				$etu = substr($email,strpos($email,"@"),4);
				// $etu contient le @ et les trois caractères qui suivent si ces derniers sont etu alors
				// c'est le mail d'un étudiant et non d'un prof
				if ($etu == "@etu"){
					// -- Si c'est un utilisateur :
					$utilisator = Utilisator::create();
					$utilisator->firstname = $_POST["firstname"];
					$utilisator->lastname = $_POST["lastname"];
					$utilisator->email = $_POST["email"];
					$utilisator->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
					$utilisator->save();
					//Etudiant
				}
				else{
					// -- Si c'est un prof :
					//Ajout dans la table utilisateur
					$utilisator = Utilisator::create();
					$utilisator->firstname = $_POST["firstname"];
					$utilisator->lastname = $_POST["lastname"];
					$utilisator->email = $_POST["email"];
					$utilisator->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
					$utilisator->save();
					
					//Ajout dans la table teacher
					$teacher = Teacher::create();
					$teacher->firstname = $_POST["firstname"];
					$teacher->lastname = $_POST["lastname"];
					$teacher->email = $_POST["email"];
					$teacher->password = password_hash($_POST["password"], PASSWORD_DEFAULT);
					$teacher->save();

				}



				

				header("Location: ?route=utilisators");	
			}
			

		} else {


			include_once "view/utilisator/addFormUtilisator.php";
		}
	}

	public function connexion() {
		if (isset($_POST["email"])	  &&
			isset($_POST["password"]))  {

			$email = $_POST["email"];
			$password = $_POST["password"];
			$result= Utilisator::allWithParam("email",$email);
			

			if(count($result)!=0){
				$connectedUser = $result[0];

				// l'email est présent dans la base de donnée
				//Vérification si le mot de passe est bien le même
				$verPassword = password_verify($password,$connectedUser->password);
				if($verPassword){
					// -> Si oui envoyé à la route home
					// -> variable de session avec utilisateur connected $_SESSION["utilisator_conn"] = Utilisator::getByConnexion($email, $pwd)
					$_SESSION["utilisateur_conn"] =  $connectedUser;
					header("Location: ?route=home");			


				}
				else{
					header("Location: ?route=connexion&mess=mdp");
				}
			}
			else{
				header("Location: ?route=connexion&mess=mail");
			}
		} else {
			include_once "view/utilisator/connexionFormUtilisator.php";
		}
	}
}