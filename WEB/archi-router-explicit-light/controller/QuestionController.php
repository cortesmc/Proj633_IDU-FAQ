<?php

$data = null;

class QuestionController {

    public function displayAllQuestion() {
        // -- DATA : Une Question
        global $data;
        $data = Question::all();

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