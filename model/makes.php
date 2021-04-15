<?php
class MakesDB{
    public static function makes() {
        $db = Database::getDB();
        $query = 'select * from makes
                    order by make';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }
    public static function make_delete($make_id) {
        $db = Database::getDB();
        $query = 'delete from makes
                    where make_id = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $statement->closeCursor();
    }
    public static function make_add($make) {
        $db = Database::getDB();
        $query = 'insert into makes
                    (make)
                    values
                    (:make)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>