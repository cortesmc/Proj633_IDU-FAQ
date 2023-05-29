<?php

$data = null;

class QuestionController {



    public function displayAllQuestion() {
        // -- TRAITEMENT FORMULAIRES

        //    -- CATEGORIES FILTER

        // Cas ou un filtre est choisi
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
        //Cas ou une recherche est faite
        elseif(!isset($_POST['filterCategoriesQuestionsFormSend']) && isset($_POST["searchBar"])){
            if(isset($_POST["searchBar"])){
                if(!empty($_POST["searchBar"])){
                    $search = $_POST["searchBar"];
                    $questionsValidate = Question::getAllValidateAndResearch($search);
                }
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




        
        if ($_SESSION['isTeacher']) 
            $teacherConnected = Teacher::getByEmail( $_SESSION['utilisateur_conn']->email );



        // -- WRITE ANSWER
        if (isset($_POST['validateAnswerFormSend'])) {

            // var_dump($_FILES);
            // var_dump($_POST);
            
            if( !is_null($_POST['shortTextAnswer'])){
                $answer = Answer::create();

                $answer->shortText = $_POST['shortTextAnswer'];
                if ($_FILES['FileAnswer']['name'] != '')
                    $answer->nameFile = 'answer_'. $_POST['writeAnswerIdAnswer'] .'_prof' . $_SESSION['utilisateur_conn']->idutilisator . '.txt';
                else 
                    $answer->nameFile = NULL;
                $answer->idteacher = Teacher::getByEmail($_SESSION['utilisateur_conn']->email)->idteacher;
                $answer->idquestion = $_GET['idQuestion'];
                $answer->save();


                // -- UPLOAD
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Vérifier si le fichier a été correctement téléchargé sans erreur
                    if (isset($_FILES['FileAnswer']) && $_FILES['FileAnswer']['error'] === UPLOAD_ERR_OK) {
                        
                        var_dump($_POST['writeAnswerIdAnswer']);

                        // -- NOM DU FICHIER :
                        $nameFile = 'answer_'. $_POST['writeAnswerIdAnswer'] .'_prof' . $_SESSION['utilisateur_conn']->idutilisator . '.txt';
                        $fichierTemporaire = $_FILES['FileAnswer']['tmp_name'];
                        


                        // -- CREATION DOSSIER POUR UPLOAD
                        // Get dossier parent
                        $parentDirectory = basename(dirname(__DIR__)) ;

                        $dataDirectory = 'data';
                        $fullPath = implode(DIRECTORY_SEPARATOR, [$parentDirectory, $dataDirectory]);

                        $nameDirectory = "question_" . Question::getByID($_GET['idQuestion'])->idquestion;

                        // Chemin du dossier à créer
                        $pathDirectory = '../' . $fullPath . '/' . $nameDirectory;

                            // Si le dossier n'existe pas -> creattion du dossier
                        if (!is_dir($pathDirectory)) {
                            // Créer le dossier
                            if (mkdir($pathDirectory, 0777)) {
                                echo "Le dossier $pathDirectory a été créé avec succès.";
                            } 
                            // else {
                            //     echo "Une erreur s'est produite lors de la création du dossier $nomDossier.";
                            // }
                        } 
                        
                        // On upload notre fichier dans le dossier data/question_[ID_QUESTION]
                        move_uploaded_file($fichierTemporaire, $pathDirectory . '/' . $nameFile); // il faut mettre son user pour savoir dans quelle public_html il faut mettre le fichier
                        
                    } 
                    // else {
                    //     echo 'Une erreur s\'est produite lors du téléchargement du fichier.';
                    // }
                }
            }
            
        }

        // -- EDIT ANSWER
        if (isset($_POST['editAnswerFormSend'])) {

            if( !is_null($_POST['editAnswershortText'])){
                $answer = Answer::getByID( $_POST['editAnswerIdAnswer'] );

                $answer->shortText = $_POST['editAnswershortText'];


                if ($_FILES['editFileAnswer']['name'] != '')
                    $answer->nameFile = 'answer_'. $_POST['editAnswerIdAnswer'] .'_prof' . $_SESSION['utilisateur_conn']->idutilisator . '.txt';
                else 
                    $answer->nameFile = $answer->nameFile;
                
                $answer->save();


                // -- UPLOAD
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Vérifier si le fichier a été correctement téléchargé sans erreur
                    if (isset($_FILES['editFileAnswer']) && $_FILES['editFileAnswer']['error'] === UPLOAD_ERR_OK) {
                        

                        // -- NOM DU FICHIER :
                        $nameFile = 'answer_'. $_POST['editAnswerIdAnswer'] .'_prof' . $_SESSION['utilisateur_conn']->idutilisator . '.txt';
                        $fichierTemporaire = $_FILES['editFileAnswer']['tmp_name'];
                        


                        // -- CREATION DOSSIER POUR UPLOAD
                        // Get dossier parent
                        $parentDirectory = basename(dirname(__DIR__)) ;

                        $dataDirectory = 'data';
                        $fullPath = implode(DIRECTORY_SEPARATOR, [$parentDirectory, $dataDirectory]);

                        $nameDirectory = "question_" . Question::getByID($_GET['idQuestion'])->idquestion;

                        // Chemin du dossier de la question
                        $pathDirectory = '../' . $fullPath . '/' . $nameDirectory;

                         
                        
                        // On upload notre fichier dans le dossier data/question_[ID_QUESTION]
                        move_uploaded_file($fichierTemporaire, $pathDirectory . '/' . $nameFile); 
                        
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
        QuestionController::likeOrUnlikeQuestion();

        // var_dump(Answer::getNbTotal());
        

        // -- VIEWS
        include_once "view/parts/header.php";
		include_once "view/question/displayOneQuestion.php";
		include_once "view/parts/footer.php";

        // echo "pppappapap";

    }

    public static function likeOrUnlikeQuestion(){
        //Cas ou le bouton est déjà rouge, donc déjà like on veut unlike quand c'est cliqué
        $idQuestion = $_GET['idQuestion'];
        $idUser = $_SESSION["utilisateur_conn"]->idutilisator;  
        if(isset($_POST['like'])){
            Utilisator::removeLiked($idUser,$idQuestion);

        }
        //L'autre cas
        if(isset($_POST['unlike'])){
            Utilisator::addLiked($idUser,$idQuestion);

        }
    }




}