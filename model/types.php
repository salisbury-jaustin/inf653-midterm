<?php
    /* DB FUNCTIONS FOR TYPES TABLE */ 

    /**** READ FUNCTIONS ****/
    function types() {
        global $db;
        $query = 'select * from types 
                    order by type';
        $statement = $db->prepare($query);
        $statement->execute();
        $types= $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    /**** DELETE FUNCTIONS ****/
    function type_delete($type_id) {
        global $db;
        $query = 'delete from types 
                    where type_id = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    }

    /**** UPDATE FUNCTIONS ****/
    function type_add($type) {
        global $db;
        $query = 'insert into types 
                    (type)
                    values
                    (:type)';
        $statement = $db->prepare($query);
        $statement->bindValue(':type', $type);
        $statement->execute();
        $statement->closeCursor();
    }
    function type_update($type_id, $type) {
        global $db;
        $query = 'update types 
                    set
                    type = :type
                    where type_id = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':class', $type);
        $statement->bindValue(':class_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>