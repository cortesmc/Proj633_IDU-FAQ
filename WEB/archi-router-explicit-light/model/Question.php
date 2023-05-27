<?php

class Question extends Model {
    
    public static function getByID($idQuestion) {
		// -- Depuis une quesion -> recup tout ses champs et ses réponses dans un tableau
		$class = get_called_class();
		$table =  strtolower($class);

		$st = db()->prepare("select * 
			from $table 
			where id$table = :id");
		$st->bindValue(':id', $idQuestion);
		$st->execute();

		$row = $st->fetch(PDO::FETCH_ASSOC);

        // var_dump($row);
		$question = new $class();
		foreach($row as $attr => $value)
			$question->$attr = $value;

        // var_dump($question);
		$question->answers = Answer::allFromQuestion($question->idquestion);
        
        // var_dump($question);

		return $question;
	}

	public static function getAllNotValidate() {
		$class = get_called_class();
        $table =  strtolower($class);
        $st = db()->prepare("SELECT *
							FROM question
							WHERE isValidate is null OR isValidate = false
            ");
        $st->execute();

        $list = array();
        while($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $h = new $class();
            foreach($row as $field=>$value)
                $h->$field = $value;
            $list[] = $h;
        }
        return $list;
    }
	
	public static function getAllValidate() {
		$class = get_called_class();
        $table =  strtolower($class);
        $st = db()->prepare("SELECT *
							FROM question
							WHERE isValidate = true
            ");
        $st->execute();

        $list = array();
        while($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $h = new $class();
            foreach($row as $field=>$value)
                $h->$field = $value;
            $list[] = $h;
        }
        return $list;
    }

	public static function getAllValidateByCategory($libeleCategorySelected) {

		// -- Get id of Category selected
		$category = Category::getByLibele($libeleCategorySelected);

		// -- Get All question linked with the id of the category
		$class = get_called_class();
        $table =  strtolower($class);
        $st = db()->prepare("SELECT *
							FROM question
							WHERE idcategory = :idcategory AND isValidate = 1
            ");
		$st->bindValue(':idcategory', $category->idcategory);
        $st->execute();

        $list = array();
        while($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $h = new $class();
            foreach($row as $field=>$value)
                $h->$field = $value;
            $list[] = $h;
        }
        return $list;
	}

	public function saveEditQuestion() {

		$class = get_called_class(); 
		$table = strtolower($class); 

		$stm = db()->prepare("
			UPDATE $table
			SET title=:title,
                descr=:descr
			WHERE id$table=:id$table
			");
            
		$stm->bindValue(":title", $this->title);
		$stm->bindValue(":descr", $this->descr);
		$stm->bindValue(":idquestion", $this->idquestion);
		$stm->execute();

	}

	public function saveValidateQuestion() {

		$class = get_called_class(); 
		$table = strtolower($class); 

		$stm = db()->prepare("
			UPDATE $table
			SET isValidate=:isValidate
			WHERE id$table=:id$table
			");

		
            
		$stm->bindValue(":isValidate", $this->isValidate);
		$stm->bindValue(":idquestion", $this->idquestion);
		$stm->execute();

	}

	public function save() {
		$class = get_called_class(); 
		$table = strtolower($class); 

		$stm = db()->prepare("
			UPDATE question
			SET title=:title,
                descr=:descr,
				idcategory=:idcategory,
				idutilisator=:idutilisator
			WHERE idquestion=:idquestion
			");
            
		$stm->bindValue(":title", $this->title);
		$stm->bindValue(":descr", $this->descr);
		$stm->bindValue(":idcategory", $this->idcategory);
		$stm->bindValue(":idutilisator", $this->idutilisator);
		
		$stm->bindValue(":idquestion", $this->idquestion);	

		$stm->execute();

	}



	public static function getAllValidateAndResearch($research) {
		// -- Get All question with a part of what is research
		$class = get_called_class();
        $table =  strtolower($class);
        $st = db()->prepare("SELECT *
							FROM question
							WHERE (title LIKE :research OR descr LIKE :research) AND isValidate = 1
            ");
		$st->bindValue(":research","%".$research."%");
        $st->execute();

        $list = array();
        while($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $h = new $class();
            foreach($row as $field=>$value)
                $h->$field = $value;
            $list[] = $h;
        }
        return $list;
	}


	public static function getAllValidateAndResearchAndByCategory($research,$libeleCategorySelected) {


		// -- Get id of Category selected
		$category = Category::getByLibele($libeleCategorySelected);


		// -- Get All question with a part of what is research and categories
		$class = get_called_class();
        $table =  strtolower($class);
        $st = db()->prepare("SELECT *
							FROM question
							WHERE (title LIKE :research OR descr LIKE :research) AND isValidate = 1 AND idcategory = :idcategory
            ");
		$st->bindValue(":research","%".$research."%");
		$st->bindValue(':idcategory', $category->idcategory);
        $st->execute();

        $list = array();
        while($row = $st->fetch(PDO::FETCH_ASSOC)) {
            $h = new $class();
            foreach($row as $field=>$value)
                $h->$field = $value;
            $list[] = $h;
        }
        return $list;
	}

}