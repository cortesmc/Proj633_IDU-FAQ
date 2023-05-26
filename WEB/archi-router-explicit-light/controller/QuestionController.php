<?php

$data = null;

class QuestionController {

    public function displayAllQuestion() {
        // -- TRAITEMENT FORMULAIRES

            // -- CATEGORIES FILTER
        if (isset($_POST['filterCategoriesQuestionsFormSend'])) {
                
            if (!empty($_POST['categoryFilter'])) {
                // -- TODO : Faire requete get all validated by categories
                $libeleCategorySelected = $_POST['categoryFilter'];

                $questionsValidate = Question::getAllValidateByCategory( $libeleCategorySelected );
            } else {
                // -- Si aucune catégories n'est selectionnée -> getAllValidate
                $questionsValidate = Question::getAllValidate();
            }
        }
        else {
            $questionsValidate = Question::getAllValidate();
        }

            // -- ADD QUESTION 
        if (isset($_POST['addQuestionFormSend'])) {
            if( !is_null($_POST['addQuestionTitle']) && !is_null($_POST['addQuestionDescr']) && $_POST['categorySelected'] != 'default' ) {

                $question = Question::create();
                $question->title = $_POST['addQuestionTitle'];
                $question->descr = $_POST['addQuestionDescr'];
                $question->idcategory = $_POST['categorySelected'];
                $question->idutilisator = $_SESSION['utilisateur_conn']->idutilisator;       
                $question->save();

            }
        }

        // -- DATA : Une Question
        global $data;
        $data = Question::all();

        $questionsNotValidate = Question::getAllNotValidate();
        $categories = Category::all();

        var_dump($questionsValidate);

        // -- VIEWS
        include_once "view/parts/header.php";
		include_once "view/question/displayAllQuestion.php";
		include_once "view/parts/footer.php";
    }

    public function displayOneQuestion() {
        // -- TRAITEMENT FORMULAIRES

        // -- EDIT QUESTION 
        if (isset($_POST['updateQuestionFormSend'])) {
            // $question = Question::getByID($_GET["idQuestion"]);
            // var_dump($question);

            if( !is_null($_POST['updateQuestionTitle']) && !is_null($_POST['updateQuestionCorps']) ) {
                $question = Question::getByID($_GET["idQuestion"]);
                $question->title = $_POST['updateQuestionTitle'];
                $question->descr = $_POST['updateQuestionCorps'];
                $question->saveEditQuestion();
            }
        }

        // -- VALIDATE QUESTION
        if (isset($_POST['validateQuestionFormSend'])) {
            $question = Question::getByID($_GET["idQuestion"]);

            $question->isValidate = true;
            $question->saveValidateQuestion();
        }


        // -- WRITE ANSWER
        if (isset($_POST['validateAnswerFormSend'])) {
            if( !is_null($_POST['shortTextAnswer'])){
                $answer = Answer::create();

                $answer->shortText = $_POST['shortTextAnswer'];
                $answer->nameFile = $_FILES['FileAnswer']['name'];
                $answer->idteacher = Teacher::getByEmail($_SESSION['utilisateur_conn']->email)->idteacher;
                $answer->idquestion = $_GET['idQuestion'];
                $answer->save();

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Vérifier si le fichier a été correctement téléchargé sans erreur
                    if (isset($_FILES['FileAnswer']) && $_FILES['FileAnswer']['error'] === UPLOAD_ERR_OK) {
                        $nomFichier = $_FILES['FileAnswer']['name'];
                        $fichierTemporaire = $_FILES['FileAnswer']['tmp_name'];
                        
                        // Déplacer le fichier temporaire vers un emplacement permanent
                        move_uploaded_file($fichierTemporaire, '/home/femathie/public_html/upload_tmp/' . $nomFichier); // il faut mettre son user pour savoir dans quelle public_html il faut mettre le fichier
                        
                        // echo 'Le fichier a été téléchargé avec succès.';
                    } 
                    // else {
                    //     echo 'Une erreur s\'est produite lors du téléchargement du fichier.';
                    // }
                }
            }
            
        }

        // -- DATA
        global $data;
        $data = Question::getByID($_GET['idQuestion']);

        // -- VIEWS
        include_once "view/parts/header.php";
		include_once "view/question/displayOneQuestion.php";
		include_once "view/parts/footer.php";

        // echo "pppappapap";

        





    }

}