<?php

$data = null;

class DeconnexionController {



	public function deconnexion() {
        /* On détruit la session en cours et on recharge la page de connexion 
        */
        //echo("Deconnexion demandée");
        session_destroy();
        //Problèmes echo ou var dump se trouuvant avec ce header cependant impossible de trouver ou...
        header("Location : ?route=connexion");
        

    }

		
}
