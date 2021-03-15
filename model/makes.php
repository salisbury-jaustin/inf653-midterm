<?php
    /* DB FUNCTIONS FOR CLASS TABLE */ 

    /**** READ FUNCTIONS ****/
    function makes() {
        global $db;
        $query = 'select * from makes 
                    order by make';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes= $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }

    /**** DELETE FUNCTIONS ****/
    function make_delete($make_id) {
        global $db;
        $query = 'delete from makes 
                    where make_id = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $statement->closeCursor();
    }

    /**** UPDATE FUNCTIONS ****/
    function make_add($make) {
        global $db;
        $query = 'insert into makes 
                    (make)
                    values
                    (:make)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->execute();
        $statement->closeCursor();
    }
    function make_update($make_id, $make) {
        global $db;
        $query = 'update make 
                    set
                    make = :make
                    where make_id = :make_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $statement->closeCursor();
    }
?>