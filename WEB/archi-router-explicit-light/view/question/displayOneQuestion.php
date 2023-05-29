

<style>
	<?php include 'css/question/question.css'; ?>
</style>


<div class='principal'>
        <div class='container_question'>

            <?php
            if (isset($_POST['edit_qst'])){
            ?>

            <!-- FORM EDIT QUESTION -->
                <form action='' method='POST'>
                    <div class='question_modif'>
                        <div class='haut_qst_modif'>
                            <div class='titre_sujet'>
                                <h4>Sujet :</h4>
                                <input type='text' name='updateQuestionTitle' id='updateQuestionTitle' value='<?php echo $data->title ?>' class='titre_modif'></input>
                            </div>
                        </div>

                        <div class='texte_qst'>
                            <textarea name='updateQuestionCorps' id='updateQuestionCorps' class='corps'><?php echo $data->descr ?></textarea>
                        </div>
                    </div>

                    <div class='qst_button'>
                    
                        <div class='btn_edit'>
                            <form action='' method='POST'>
                                <input type='submit' value='CANCEL' name='back_qst'></input>
                            </form>
                        </div>

                        <div class='btn_valider'>
                            <input type='submit' value='VALIDER MODIFICATIONS' name="updateQuestionFormSend" id='updateQuestionFormSend' ></input>
                        </div>

                    </div>

                </form>
                <!-- FIN FORM EDIT QUESTION -->
                
                

            <?php
            }
            
            else {
            ?>
                <div class='background'>
                    <div class='question'>

                        <div class='haut_qst'>

                            <div class='titre_sujet'>
                                <h4>Sujet :</h4>
                                <p> <?php echo $data->title ?> </p>
                            </div>

                            <div class='btn_like'>
                                <input type='submit' value='❤'></input>
                            </div>
                        </div>

                        <div class='texte_qst'>
                            <p> <?php echo $data->descr ?> </p>
                        </div>
                    </div>
                </div>

                <?php
                if ($_SESSION['isTeacher']) {
                ?>
                
                    <div class='qst_button'>

                        <div class='btn_edit'>
                            <form action='' method='POST'>
                                <input type='submit' value='EDIT' name='edit_qst'></input>
                            </form>
                        </div>

                        <?php if (!$data->isValidate) { ?>
                        <div class='btn_valider'>
                            <form action="" method="POST">
                                <input type='submit' value='VALIDER' name="validateQuestionFormSend"></input>
                            </form>
                        </div>

                        <?php 
                        } 
                        ?>

                    </div>
            <?php
                }
            }
            ?>

        </div>

        <div class ='container_response'>
            <div class='response_title'>
                <h2>Réponses : (<?php echo count($data->answers)?>)</h2>
            </div>

            <?php

            if ($_SESSION['isTeacher']) {
                if (isset($_POST["write_answer"])){

                    
            ?>
                <form action='' method='POST' class='form_write_answer' enctype='multipart/form-data'>
                    <input type="hidden" id="writeAnswerIdAnswer" name="writeAnswerIdAnswer" value="<?php echo Answer::getLastId() + 1?>">

                    <div class='btn_for_answer'>
                        <div class='btn_annuler_answer'>
                            <input type='submit' value='Annuler reponse' name='annuler_reponse'></input>
                        </div>
                        <div class='btn_valid_answer'>
                            <input type='submit' value='Valider reponse' name='validateAnswerFormSend'></input>
                        </div>
                    </div>
                    <div class='response_write'>
                        <div class='haut_qst_reponse'>
                            <div class='label_answer'>
                                <h4>Ecrire la réponse ici</h4>
                            </div>
                        </div>
                        <div class='texte_response'>
                            <textarea name='shortTextAnswer' id='shortTextAnswer' class='shorttext' placehorder='Ecrivez votre réponse ici'></textarea>
                        </div>
                        <div class='drop_response'>
                            <input type='file' name='FileAnswer' class='longtext' placehorder='Mettez fotre fichier ici'></input>
                        </div>
                    </div>
                </form>
                
                <?php
                }
                else {
                ?>
                    
                    <div class='btn_write'>
                        <form action='' method='POST'><input type='submit' value='Write answer' name='write_answer'></input></form>
                    </div>
                <?php
                }
            }
                
            ?>

            
            <div class='liste_response'>

            <?php
            
            foreach($data->answers as $answer) {
                            
                if (isset($_POST['edit_answer_' . $answer->idanswer])){
                ?>
                       
                    <form action='' method='POST' enctype='multipart/form-data'>
                        <input type="hidden" id="editAnswerIdAnswer" name="editAnswerIdAnswer" value="<?php echo $answer->idanswer ?>">

                        <div class='question_modif'>
                            <div class='haut_qst_modif'>
                                <div class='titre_sujet'>
                                    <h4>Sujet : <?php echo $data->title ?> </h4>
                                </div>
                            </div>
    
                            <div class='texte_qst'>
                                <textarea name='editAnswershortText' class='corps'><?php echo $answer->shortText ?> </textarea>
                            </div>

                            <input type='file' name='editFileAnswer' class='longtext' placehorder='Mettez fotre fichier ici'></input>

                        </div>

                        <div class='qst_button'>

                            <div class='btn_edit'>
                                <form action='' method='POST'><input type='submit' value='CANCEL' name='back_qst'></input></form>
                            </div>

                            <div class='btn_valider'>
                                <input type='submit' value='VALIDER MODIFICATIONS' name="editAnswerFormSend"></input>
                            </div>
                        </div>

                    </form>
        
                        
                    
                <?php
                }
                    
                else{
                ?>
                        
                    <div class='background'>
                        <div class='response'>
                            <div class='haut_qst'>
                                <div class='titre_sujet'>
                                    <h4>Sujet :</h4>
                                    <p> <?php echo $data->title ?> </p>
                                </div>

                            <?php 
                            if (isset($teacherConnected) && $teacherConnected->idteacher == $answer->idteacher) {
                            ?>
                                <div class='btn_etit_response'>
                                    <form action='' method='POST'><input type='submit' value='EDIT' name=<?php echo 'edit_answer_' . $answer->idanswer ?>  ></input></form>
                                </div>
                            <?php
                            }
                            ?>

                            </div>
                            <div class='texte_answer'>
                                <p> <?php echo $answer->shortText ?> </p>
                            </div>

                            

                            <?php
                            if ($answer->nameFile == NULL) {
                                echo "<h3>Aucune réponse longue pour cette question</h3>";
                            } else {
                            ?>

                            <div class='file_qst'>
                                <form action='' method='POST'><input type='submit' value='VOIR LONG TEXT' name=<?php echo 'view_long_text_' . $answer->idanswer ?> ></input></form>
                            </div>

                            <?php
                                if (isset($_POST['view_long_text_' . $answer->idanswer])) {
                                                                
                                    
                                    $pathFile = 'data/question_' . $data->idquestion . '/' . $answer->nameFile;

                                    // Lecture du fichier et stockage du contenu dans une variable
                                    $contentFile = file_get_contents($pathFile);

                                    echo $contentFile;
                            }
                        }
                            ?>
                            
                        </div>
                    </div>
            <?php
                }
            }                    
            ?>
                
            </div>
        </div>
    </div>