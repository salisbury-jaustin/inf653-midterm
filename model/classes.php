<?php
    /* DB FUNCTIONS FOR CLASS TABLE */ 

    /**** READ FUNCTIONS ****/
    function classes() {
        global $db;
        $query = 'select * from classes
                    order by class';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

    /**** DELETE FUNCTIONS ****/
    function class_delete($class_id) {
        global $db;
        $query = 'delete from classes
                    where class_id = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }

    /**** UPDATE FUNCTIONS ****/
    function class_add($class) {
        global $db;
        $query = 'insert into classes
                    (class)
                    values
                    (:class)';
        $statement = $db->prepare($query);
        $statement->bindValue(':class', $class);
        $statement->execute();
        $statement->closeCursor();
    }
    function class_update($class_id, $class) {
        global $db;
        $query = 'update classes
                    set
                    class = :class
                    where class_id = :class_id';
        $statement = $db->prepare($query);
        $statement->bindValues(':class', $class);
        $statement->bindValues(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>