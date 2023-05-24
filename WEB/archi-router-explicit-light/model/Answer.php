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
}