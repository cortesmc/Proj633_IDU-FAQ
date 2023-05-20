<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='template_PageConnexion.css' />
    <title>Document</title>
</head>
<body>
    <div class="container_connexion">
        <div>
            <?php
            $showLoginForm = !isset($_POST['CreerCompte']);

            if ($showLoginForm) {
                echo '
                <H1 id="title">Connexion</H1><br>
                <div id="container_info">
                    <div class="ligne">
                        <H2 for="username" class="form_el">Username</H2><br>
                        <input type="text" id="username" name="username" class="textArea"><br>
                    </div>
                    <div class="ligne">
                        <H2 for="password" class="form_el">Mot de passe</H2><br>
                        <input type="password" id="password" name="password" class="textArea"><br>
                    </div>
                </div>
                ';
            } else {
                echo '
                <H1 id="title">Creation de compte</H1><br>
                <div id="container_info">
                    <div class="ligne">
                        <H2 for="Prenom" class="form_el">Prenom</H2><br>
                        <input type="text" id="Prenom" name="Prenom" class="textArea"><br>
                    </div>
                    <div class="ligne">
                        <H2 for="Nom" class="form_el">Nom:</H2><br>
                        <input type="text" id="Nom" name="Nom" class="textArea"><br>
                    </div>
                    <div class="ligne">
                        <H2 for="Mdp" class="form_el">Mdp:</H2><br>
                        <input type="password" id="Mdp" name="Mdp" class="textArea"><br>
                    </div>
                </div>
                ';
            }
            ?>
            <form method="POST" action="">
                <input type="hidden" name="page" value="5">
                <?php
                if ($showLoginForm) {
                    echo '<input type="submit" value="Connexion" name="Connexion" class="button" id="connexion">';
                    echo '<input type="submit" value="Créer un compte" name="CreerCompte" class="button" id="creer-compte">';
                } else {
                    echo '<input type="submit" value="Creer" name="Creer" class="button" id="Creer">';
                    echo '<input type="submit" value="Retour" name="Retour" class="button" id="retour">';
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
