

<style>
	<?php include 'css/question/allQuestion.css'; ?>
</style>


<div id='content'>
        <!-- PHP : ask_container apparait uniquement si un etudiant est connecté -->

        <?php
        if (!$_SESSION['isTeacher']) {
        ?>
        <div id='ask_container' class='container leftContainer'>
            <?php
            if (isset($_POST["ask_question"])){
            ?>
            <form action='page_all_questions.php' method='post'>
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
            </form>
            <?php
            }
            else{
            ?>
            <form action='page_all_questions.php' method='post'>
                <input type='submit' class='btn' name='ask_question' id='writeBtn' value='Poser une question'>
            </form>
            <?php
            }
            ?>
        </div>   

        <?php 
        } 
        ?>
       
        <!-- PHP : unvalidated_container apparait uniquement si un prof est connecté -->
        <?php 
        if ($_SESSION['isTeacher']) {
        ?>
            <div id='unvalidated_container' class='container leftContainer'>

            <?php
            if (count($questionsNotValidate) == 0) {
            ?>
                <h2>Aucune question n'est à valider pour le moment ...</h2>
            <?php
            }
            else {
            ?>
                <h2 id='unvalidatedHeader'>Questions à valider</h2>
                <div id='all_unvalidated'>
                <!-- liste des questions pas encore validées -->

                <?php
                    foreach($questionsNotValidate as $questionNotValidate) {
                ?>
                    <div class='unvalidatedQ'>
                        <a href='?route=question&idQuestion=<?php echo $questionNotValidate->idquestion ?>' class='unvalidatedTitle'> 
                            <?php echo $questionNotValidate->title ?> 
                        </a>
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
            ?>
                    <div id=filterDiv>
                        <form action='' method='post'>
                            <div id=allCategories>";
                            <!-- // liste des categories sous forme de checkbox
                            // remplacer categorie1,2,3 par le nom de la categorie 
                            // attention bien le faire partout : id de la checkbox, for du label, texte du label -->
                                <div class='checkboxdiv'>
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
                    </div>
            <?php
                }
            ?>

            <!-- div avec toutes les questions : modifier php -->
            <div id='allQuestions'>

            <?php
            foreach($questionsValidate as $questionValidate) {
            ?>
                <div class=questionBG>
                    <div class='question'>
                        <a href='?route=question&idQuestion=<?php echo $questionValidate->idquestion ?>' class='questionTitle'><?php echo $questionValidate->title ?></a>
                        <input type='submit' value='❤' class='like'></input>
                    </div>
                </div>

            <?php
            }
            ?>
                
            </div>
        </div>
    </div>