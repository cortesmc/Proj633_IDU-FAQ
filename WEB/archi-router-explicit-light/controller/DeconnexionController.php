<?php

$data = null;

class DeconnexionController {



	public function deconnexion() {
        /* On détruit la session en cours et on recharge la page de connexion 
        */

        if(isset($_POST["deconnexion"])){
            session_destroy();
            echo '<meta http-equiv="refresh" content="0;url=?route=connexion">';

        }
    }

		
}
