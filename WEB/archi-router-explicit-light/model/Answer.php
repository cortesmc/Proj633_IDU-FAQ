<?php

class Answer extends Model {

    public static function allFromQuestion($idQuestion) {
        $class = get_called_class();
        $table =  strtolower($class);
        $st = db()->prepare("SELECT a.idanswer, a.shortText, a.nameFile, a.idteacher, a.idquestion
            FROM answer a
                JOIN question q ON a.idquestion = q.idquestion
            WHERE q.idquestion = $idQuestion
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

    public function save() {
		// Données connues :
		// $this->idbeer
		// $this->name
		// $this->color

		$class = get_called_class(); 
		$table = strtolower($class); 

		$stm = db()->prepare("
			UPDATE $table
			SET shortText=:shortText,
                nameFile=:nameFile,
				idteacher=:idteacher,
				idquestion=:idquestion
			WHERE id$table=:id$table
			");
            
		$stm->bindValue(":shortText", $this->shortText);
		$stm->bindValue(":nameFile", $this->nameFile);
		$stm->bindValue(":idteacher", $this->idteacher);
		$stm->bindValue(":idquestion", $this->idquestion);

		$stm->bindValue(":idanswer", $this->idanswer);
		$stm->execute();

	}
}