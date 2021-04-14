<?php
class TypesDB {
    public static function types() {
        Database::getDB();
        $query = 'select * from types
                    order by type';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }
    public static function type_delete($type_id) {
        Database::getDB();
        $query = 'delete from types
                    where type_id = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    }
    public static function type_add($type) {
        Database::getDB();
        $query = 'insert into types
                    (type)
                    values
                    (:type)';
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>