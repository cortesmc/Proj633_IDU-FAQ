<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='template_page_question.css' />
    <title>Document</title>
</head>
<body>
    <header>
        <H1>TITRE DU SITE</H1>
    </header>
    <div class='principal'>
        <div class='container_question'>

            <?php
            if (isset($_POST['edit_qst'])){
                echo"
                <form action='template_page_question.php' method='POST'>
                    <div class='question_modif'>
                        <div class='haut_qst_modif'>
                            <div class='titre_sujet'>
                                <h4>Sujet :</h4>
                                <input type='text' name='titre' value='Ceci est un titre' class='titre_modif'></input>
                            </div>
                        </div>

                        <div class='texte_qst'>
                            <textarea name='corps' class='corps'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus magnam facere modi nobis repellat esse provident quas incidunt maxime necessitatibus sint molestiae magni beatae in suscipit officiis doloremque, harum perferendis!
                            </textarea>
                        </div>
                    </div>
                </form>

                
                <div class='qst_button'>
                    <div class='btn_edit'>
                        <form action='template_page_question.php' method='POST'><input type='submit' value='CANCEL' name='back_qst'></input></form>
                    </div>
                    <div class='btn_valider'>
                        <input type='submit' value='VALIDER MODIFICATIONS'></input>
                    </div>
                </div>
                ";
            }
            else{
                echo"
                <div class='background'>
                    <div class='question'>
                        <div class='haut_qst'>
                            <div class='titre_sujet'>
                                <h4>Sujet :</h4>
                                <p>Ceci est un titre</p>
                            </div>
                            <div class='btn_like'>
                                <input type='submit' value='❤'></input>
                            </div>
                        </div>

                        <div class='texte_qst'>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus magnam facere modi nobis repellat esse provident quas incidunt maxime necessitatibus sint molestiae magni beatae in suscipit officiis doloremque, harum perferendis!</p>
                        </div>
                    </div>
                </div>
                
                <div class='qst_button'>
                    <div class='btn_edit'>
                        <form action='template_page_question.php' method='POST'><input type='submit' value='EDIT' name='edit_qst'></input></form>
                    </div>
                    <div class='btn_valider'>
                        <input type='submit' value='VALIDER'></input>
                    </div>
                </div>
                ";
            }
            ?>

        </div>
        <div class ='container_response'>
            <div class='response_title'>
                <H2>Réponses : (nb_reponses)</H2>
            </div>

            <?php
                if (isset($_POST["write_answer"])){
                    echo"
                    <form action='template_page_question.php' method='POST' class='form_write_answer'>
                    <div class='btn_for_answer'>
                        <div class='btn_annuler_answer'>
                            <input type='submit' value='Annuler reponse' name='annuler_reponse'></input>
                        </div>
                        <div class='btn_valid_answer'>
                            <input type='submit' value='Valider reponse' name='valider_reponse'></input>
                        </div>
                    </div>
                    <div class='response_write'>
                        <div class='haut_qst_reponse'>
                            <div class='label_answer'>
                                <h4>Ecrire la réponse ici</h4>
                            </div>
                        </div>
                        <div class='texte_response'>
                            <textarea name='shorttext' class='shorttext' placehorder='Ecrivez votre réponse ici'></textarea>
                        </div>
                        <div class='drop_response'>
                            <input type='file' name='longtext' class='longtext' placehorder='Mettez fotre fichier ici'></input>
                        </div>
                    </div>
                    </form>
                    ";
                }
                else{
                    echo"
                    <div class='btn_write'>
                        <form action='template_page_question.php' method='POST'><input type='submit' value='Write answer' name='write_answer'></input></form>
                    </div>
                    ";
                }
            ?>

            <?php
            echo"<div class='liste_response'>";
                $counter = 0;
                while ($counter < 5){
                    
                    if (isset($_POST["edit"])){
                        echo"
                        <form action='template_page_question.php' method='POST'>
                            <div class='question_modif'>
                                <div class='haut_qst_modif'>
                                    <div class='titre_sujet'>
                                        <h4>Sujet :</h4>
                                        <input type='text' name='titre' value='Ceci est un titre' class='titre_modif'></input>
                                    </div>
                                </div>
        
                                <div class='texte_qst'>
                                    <textarea name='corps' class='corps'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus magnam facere modi nobis repellat esse provident quas incidunt maxime necessitatibus sint molestiae magni beatae in suscipit officiis doloremque, harum perferendis!
                                    </textarea>
                                </div>
                            </div>
                        </form>
        
                        
                        <div class='qst_button'>
                            <div class='btn_edit'>
                                <form action='template_page_question.php' method='POST'><input type='submit' value='CANCEL' name='back_qst'></input></form>
                            </div>
                            <div class='btn_valider'>
                                <input type='submit' value='VALIDER MODIFICATIONS'></input>
                            </div>
                        </div>
                        ";
                    }
                    else{
                        echo"
                        <div class='background'>
                            <div class='response'>
                                <div class='haut_qst'>
                                    <div class='titre_sujet'>
                                        <h4>Sujet :</h4>
                                        <p>Ceci est un titre</p>
                                    </div>
                                    <div class='btn_etit_response'>
                                        <form action='template_page_question.php' method='POST'><input type='submit' value='EDIT' name='edit'></input></form>
                                    </div>
                                </div>
                                <div class='texte_qst'>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus magnam facere modi nobis repellat esse provident quas incidunt maxime necessitatibus sint molestiae magni beatae in suscipit officiis doloremque, harum perferendis!</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus magnam facere modi nobis repellat esse provident quas incidunt maxime necessitatibus sint molestiae magni beatae in suscipit officiis doloremque, harum perferendis!</p>
                                </div>
                            </div>
                        </div>
                        ";
                        }
                    $counter++;
                }

                    
            ?>
                





                <div class='background'>
                    <div class='response'>
                        <div class='haut_qst'>
                            <div class='titre_sujet'>
                                <h4>Sujet :</h4>
                                <p>Ceci est un titre</p>
                            </div>
                            <div class='btn_etit_response'>
                                <form action='template_page_question.php' method='POST'></form><input type='submit' value='EDIT' name='edit'></input>
                            </div>
                        </div>
                        <div class='texte_qst'>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus magnam facere modi nobis repellat esse provident quas incidunt maxime necessitatibus sint molestiae magni beatae in suscipit officiis doloremque, harum perferendis!</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus magnam facere modi nobis repellat esse provident quas incidunt maxime necessitatibus sint molestiae magni beatae in suscipit officiis doloremque, harum perferendis!</p>
                        </div>
                    </div>
                </div>

                <div class='background'>
                    <div class='response'>
                        <div class='haut_qst'>
                            <div class='titre_sujet'>
                                <h4>Sujet :</h4>
                                <p>Ceci est un titre</p>
                            </div>
                            <div class='btn_etit_response'>
                                <input type='submit' value='EDIT'></input>
                            </div>
                        </div>
                        <div class='texte_qst'>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus magnam facere modi nobis repellat esse provident quas incidunt maxime necessitatibus sint molestiae magni beatae in suscipit officiis doloremque, harum perferendis!</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus magnam facere modi nobis repellat esse provident quas incidunt maxime necessitatibus sint molestiae magni beatae in suscipit officiis doloremque, harum perferendis!</p>
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</body>
</html>