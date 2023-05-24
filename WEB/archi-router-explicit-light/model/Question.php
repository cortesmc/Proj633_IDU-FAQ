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




}
