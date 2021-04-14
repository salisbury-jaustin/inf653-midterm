<?php
class ClassesDB {
    public static function classes() {
        Database::getDB();
        $query = 'select * from classes
                    order by class';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }
    public static function class_delete($class_id) {
        Database::getDB();
        $query = 'delete from classes
                    where class_id = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }
    public static function class_add($class) {
        Database::getDB();
        $query = 'insert into classes
                    (class)
                    values
                    (:class)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class', $class);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>