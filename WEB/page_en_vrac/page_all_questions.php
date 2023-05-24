<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='page_all_questions.css' />
    <title>Document</title>
</head>
<body>
    <header>
        <div class='titre_site'>
            <H1>TITRE DU SITE</H1>
        </div>
        <div class='compte'>
            <form action="" method="post"><input type="submit" value="Se deconnecter 👤"></form>
        </div>
    </header>
    <div id='content'>
        <!-- PHP : ask_container apparait uniquement si un etudiant est connecté -->
        <div id='ask_container' class='container leftContainer'>
            <?php
            if (isset($_POST["ask_question"])){
                echo"<form action='page_all_questions.php' method='post'>
                <div id='QBtns'>
                    <input type='submit' class='btn' id='backBtn' value='Annuler'>
                    <input type='submit' class='btn' id='sendBtn' value='Envoyer'>
                </div>
                <div id='questionEntry'>
                    <div id='writeHeader'>
                        <span id='subject'>Sujet : </span>
                        <input type='text' id='subjectTA'>
                    </div>
                    <textarea name='questionTA' id='TextAreaQuestion' cols='30' rows='10'></textarea>
                </div>
                </form>";
            }
            else{
            echo "<form action='page_all_questions.php' method='post'>
                <input type='submit' class='btn' name='ask_question' id='writeBtn' value='Poser une question'>
            </form>";
            }
            ?>
        </div>   
        <!-- PHP : unvalidated_container apparait uniquement si un prof est connecté -->
        <div id='unvalidated_container' class='container leftContainer'>
            <h2 id='unvalidatedHeader'>Questions à valider</h2>
            <div id='all_unvalidated'>
            <!-- liste des questions pas encore validées -->
                <div class='unvalidatedQ'>
                    <a href='' class='unvalidatedTitle'>Question pas validée</a>
                </div>
                <div class='unvalidatedQ'>
                    <a href='' class='unvalidatedTitle'>Question pas validée</a>
                </div>
                <div class='unvalidatedQ'>
                    <a href='' class='unvalidatedTitle'>Question pas validée</a>
                </div>
            </div>
        </div>
        
        <div id='questions_container' class='container'>
            <div id=searchDiv>
                <span>Recherche : </span>
                <div id='searchBarDiv'>
                    <form action='' method='post'>
                        <input type='text' id='searchBar'>
                    </form>
                </div>
                <div id='filter'>
                    <form action='' method='post'>
                        <input type='submit' class='btn' name='filterBtn' id='filterBtn' value='Filtres'>
                    </form>
                </div>
            </div>
            <?php
                if(isset($_POST["filterBtn"])){
                    echo"<div id=filterDiv>
                        <form action='' method='post'>
                            <div id=allCategories>";
                            // liste des categories sous forme de checkbox
                            // remplacer categorie1,2,3 par le nom de la categorie 
                            // attention bien le faire partout : id de la checkbox, for du label, texte du label
                                echo"<div class='checkboxdiv'>
                                    <input type='checkbox' class='categorie_checkbox' id='categorie1'>
                                    <label for='categorie1'>Categorie1</label>
                                </div>
                                <div class='checkboxdiv'>
                                    <input type='checkbox' class='categorie_checkbox' id='categorie2'>
                                    <label for='categorie2'>Categorie2</label>
                                </div>
                                <div class='checkboxdiv'>
                                    <input type='checkbox' class='categorie_checkbox' id='categorie3'>
                                    <label for='categorie3'>Categorie3</label>
                                </div>
                            </div>
                            <div id='filter_buttons'>
                                <input type='submit' class='btn' name='filterbackBtn' id='filterbackBtn' value='Annuler'>
                                <input type='submit' class='btn' name='filtersendBtn' id='filtersendBtn' value='Valider'>
                            </div>
                        </form>
                    </div>";
                }
            ?>

            <!-- div avec toutes les questions : modifier php -->
            <div id='allQuestions'>
                <div class=questionBG>
                    <div class='question'>
                        <a href='' class='questionTitle'>Ceci est un titre</a>
                        <input type='submit' value='❤' class='like'></input>
                    </div>
                </div>
                <div class=questionBG>
                    <div class='question'>
                        <a href='' class='questionTitle'>Ceci est un titre</a>
                        <input type='submit' value='❤' class='like'></input>
                    </div>
                </div>
                <div class=questionBG>
                    <div class='question'>
                        <a href='' class='questionTitle'>Ceci est un titre</a>
                        <input type='submit' value='❤' class='like'></input>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>