

<style>
	<?php include 'css/question/allQuestion.css'; ?>
</style>


<div id='content'>
        <!-- PHP : ask_container apparait uniquement si un etudiant est connecté -->

        <?php
        if (!$_SESSION['isTeacher']) {
        ?>
        <div id='ask_container' class='leftContainer'>
            <?php
            if (isset($_POST["ask_question"])){
            ?>
            <form action='' method='post'>

                <div id='QBtns'>
                    <input type='submit' class='btn' id='backBtn' value='Annuler'>
                    <input type='submit' class='btn' id='sendBtn' name="addQuestionFormSend" value='Envoyer'>
                </div>
                
                <div id='questionEntry'>
                    <div id='writeHeader'>
                        <span id='subject'>Sujet : </span>
                        <input type='text' id='subjectTA' name="addQuestionTitle">
                    </div>

                    <select name="categorySelected" id="categorySelected">
                        <option value="default">-- Catégorie --</option>
                    <?php
                    foreach($categories as $categoryQuestion) {
                    ?>
                        <option value=" <?php echo $categoryQuestion->idcategory; ?>"> <?php echo $categoryQuestion->libele; ?> </option>;
                    <?php
                    }
                    ?>
            

                    </select>

                    <textarea id='TextAreaQuestion' cols='30' rows='10' name="addQuestionDescr"></textarea>
                </div>
            </form>
            <?php
            }
            else{
            ?>
            <form action='' method='post'>
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
            <div id='unvalidated_container' class='leftContainer'>

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
        ?>
            </div>
        <?php 
        }
        ?>

        <div id='questions_container' class='container'>
            <div id=searchDiv>
                <div id='searchBarDiv'>
                    <span>Recherche : </span>
                    <form action='' method='post'>
                        <input type='text' id='searchBar' name='searchBar'>
                        <input type="submit" value="🔍" name="searchSend" id="searchSend">                        
                    </form>
                </div>
                <div id='filter'>
                    <form action='' method='post'>
                        <input type='submit' class='btn' name='filterBtn' id='filterBtn' value='Filtres'>
                    </form>
                    <!-- <p class="btn" id='filterBtn'>Filtres</p> -->
                </div>
            </div>
            
            <?php
            if(isset($_POST['filterBtn'])){
            ?>
            <div id=filterDiv>
                <form action='' method='post'>
                    <div id='allCategories' class='display_none'>
                    <!-- // liste des categories sous forme de checkbox
                    // remplacer categorie1,2,3 par le nom de la categorie 
                    // attention bien le faire partout : id de la checkbox, for du label, texte du label -->

                    <?php
                    foreach($categories as $categoryFilter) {
                    ?>
                        <div class='checkboxdiv'>
                            <input type='radio' class='categorie_checkbox' 
                                    id='<?php echo $categoryFilter->libele ?>' 
                                    value='<?php echo $categoryFilter->libele ?>' 
                                    name='categoryFilter'
                                    <?php if(isset($_POST['categoryFilter']) && $_POST['categoryFilter'] == $categoryFilter->libele){echo 'checked';} ?>
                                    >
                            <label for='<?php echo $categoryFilter->libele ?>' ><?php echo $categoryFilter->libele ?></label>
                        </div>

                    <?php
                    }
                    ?>
                    </div>
                    <div id="filter_buttons">
                        <input type="submit" value="Annuler" class="btn" name="filterCategoriesQuestionsFormBack" id="filterCategoriesQuestionsFormBack">
                        <input type="submit" value="Valider" class="btn" name="filterCategoriesQuestionsFormSend" id="filterCategoriesQuestionsFormSend">
                    </div>
                </form>
            </div>
            <?php
            }
            ?>
            

            <!-- div avec toutes les questions : modifier php -->
            <div id='allQuestions'>
            
                

            <?php
            if (empty($questionsValidate) && isset($_POST['categoryFilter'])) {
                echo "<h2>Aucune question n'est liée a la catégorie ". $_POST['categoryFilter']." pour le moment</h2>";
            }
            else if (empty($questionsValidate)) {
                echo "<h2>Aucune question n'est validée pour le moment</h2>";
            }
            else {
                foreach($questionsValidate as $questionValidate) {
                ?>
                    <div class=questionBG>
                        <div class='question'>
                            <a href='?route=question&idQuestion=<?php echo $questionValidate->idquestion ?>' class='questionTitle'><?php echo $questionValidate->title ?></a>
                            <?php
                                if(in_array($questionValidate->idquestion,$_SESSION["utilisateur_conn"]->getLiked())){
                            ?>
                            <span style="color:#e94848"class='like'>❤</span>   
                            <?php
                            }
                            else{
                            ?>
                            <span style="color: rgb(196,196,196)"class='like'>❤</span>   
                            <?php
                            }
                            ?>
                            <!-- <input type='submit' value='❤' class='like'></input> -->
                        </div>
                    </div>

                <?php
                }
            }
            ?>
                
            </div>
        </div>
</div>






<script>
    <?php include 'js/question/allQuestion.js'; ?>
</script>