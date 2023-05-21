<?php

class Book extends Model {

    public function save() {
		// Données connues :
		// $this->idbeer
		// $this->name
		// $this->color

		$stm = db()->prepare("
			update Book
			set title=:title,
			    year=:color
			where idbook=:idbook
			");
            
		$stm->bindValue(":title", $this->name);
		$stm->bindValue(":year", $this->year);
		$stm->bindValue(":idbook", $this->idbook);
		$stm->execute();

	}
    
}