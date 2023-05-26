<?php

$data = null;

class QuestionController {

    public function displayAllQuestion() {
        // -- TRAITEMENT FORM
            // -- CATEGORIES
        if (isset($_POST['filterCategoriesQuestionsFormSend'])) {
                
            if (!empty($_POST['category'])) {
                // -- TODO : Faire requete get all validated by categories
                $libeleCategorySelected = $_POST['category'];

                $questionsValidate = Question::getAllValidateByCategory( $libeleCategorySelected );
            } else {
                // -- Si aucune catégories n'est selectionnée -> getAllValidate
                $questionsValidate = Question::getAllValidate();
            }
        }
        else {
            $questionsValidate = Question::getAllValidate();
        }

        // -- DATA : Une Question
        global $data;
        $data = Question::all();

        $questionsNotValidate = Question::getAllNotValidate();
        $categories = Category::all();

        // Question::getAllValidateByCategories( $categoriesSelected );
        // var_dump($categories);

        // var_dump($_SESSION);

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
            // if( !is_null($_POST['shortTextAnswer']) || !is_null($_POST['FileAnswer']) ){
            //     $answer = Answer::create();

            //     $answer->shortText = $_POST['shortTextAnswer'];
            //     $answer->nameFile = $_POST['FileAnswer'];
            //     $answer->idteacher =$_SESSION['utilisator_conn']->
            //     $answer->save();
            // }
            
        }
        // var_dump($_SESSION);

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