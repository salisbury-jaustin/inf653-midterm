<?php 
    /* DB FUNCTIONS FOR VEHICLES TABLE */

    /**** READ FUNCTIONS ****/
    // default vehicles query (sorted by price)
    function vehicles_default() {
        global $db;
        $query = 'select v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price 
                    from vehicles v 
                    inner join makes m on m.make_id = v.make_id
                    inner join types t on t.type_id = v.type_id
                    inner join classes c on c.class_id = v.class_id
                    order by price desc';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles= $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    // vehicles sorted by radio value 
    function vehicles_radio_year() {
        global $db;
        $query = 'select v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price 
                    from vehicles v 
                    inner join makes m on m.make_id = v.make_id
                    inner join types t on t.type_id = v.type_id
                    inner join classes c on c.class_id = v.class_id
                    order by year desc';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles= $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    // default vehicle type query (sorted by price)
    function vehicles_type_default($type_id) {
        global $db;
        $query = 'select v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price 
                    from vehicles v 
                    inner join makes m on m.make_id = v.make_id
                    inner join types t on t.type_id = v.type_id
                    inner join classes c on c.class_id = v.class_id
                    where v.type_id = :type_id
                    order by price desc';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
    
    // vehicle type query by year
    function vehicles_type_byYear($type_id) {
        global $db;
        $query = 'select v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price 
                    from vehicles v 
                    inner join makes m on m.make_id = v.make_id
                    inner join types t on t.type_id = v.type_id
                    inner join classes c on c.class_id = v.class_id
                    where v.type_id = :type_id
                    order by year desc';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    // default vehicle class query (sorted by price)
    function vehicles_class_default($class_id) {
        global $db;
        $query = 'select v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price 
                    from vehicles v 
                    inner join makes m on m.make_id = v.make_id
                    inner join types t on t.type_id = v.type_id
                    inner join classes c on c.class_id = v.class_id
                    where v.class_id = :class_id
                    order by price desc';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }  

    // vehicle class query by year
    function vehicles_class_byYear($class_id) {
        global $db;
        $query = 'select v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price 
                    from vehicles v 
                    inner join makes m on m.make_id = v.make_id
                    inner join types t on t.type_id = v.type_id
                    inner join classes c on c.class_id = v.class_id
                    where v.class_id = :class_id
                    order by year desc';
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    // default vehicle class query (sorted by price)
    function vehicles_make_default($make_id) {
        global $db;
        $query = 'select v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price 
                    from vehicles v 
                    inner join makes m on m.make_id = v.make_id
                    inner join types t on t.type_id = v.type_id
                    inner join classes c on c.class_id = v.class_id
                    where v.make_id = :make_id
                    order by price desc';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
    // vehicle make query by year
    function vehicles_make_byYear($make_id) {
        global $db;
        $query = 'select v.vehicle_id, v.year, m.make, v.model, t.type, c.class, v.price 
                    from vehicles v 
                    inner join makes m on m.make_id = v.make_id
                    inner join types t on t.type_id = v.type_id
                    inner join classes c on c.class_id = v.class_id
                    where v.make_id = :make_id
                    order by year desc';
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    /**** DELETE FUNCTIONS ****/
    function vehicles_delete($vehicle_id) {
        global $db;
        $query = 'delete from vehicles
                    where vehicle_id = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statement->closeCursor();
    }

    /**** UPDATE FUNCTIONS ****/
    function vehicles_add($add_array) { // form values are stored in an array to reduce number of parameters to pass
        global $db;
        $query = 'insert into vehicles
                    (year, model, price, type_id, class_id, make_id)
                    values 
                    (:year, :model, :price, :type_id, :class_id, :make_id)';
        $statement = $db->prepare($query);
        $statement-> bindValue(':year', $add_array['year']);
        $statement-> bindValue(':model', $add_array['model']);
        $statement-> bindValue(':price', $add_array['price']);
        $statement-> bindValue(':type_id', $add_array['type_id']);
        $statement-> bindValue(':class_id', $add_array['class_id']);
        $statement-> bindValue(':make_id', $add_array['make_id']);
        $statement->execute();
        $statement->closeCursor();
    }
    function vehicles_update($vehicle_id, $update_array) { // form values are stored in an array to reduce number of parameters to pass
        global $db;
        $query = 'update vehicles
                    set
                    year = :year,
                    model = :model,
                    price = :price,
                    type_id = :type_id,
                    class_id = :class_id,
                    make_id = :make_id
                    where vehicle_id = :vehicle_id';
        $statement = $db->prepare($query);
        $statement-> bindValue(':year', $update_array['year']);
        $statement-> bindValue(':model', $update_array['model']);
        $statement-> bindValue(':price', $update_array['price']);
        $statement-> bindValue(':type_id', $update_array['type_id']);
        $statement-> bindValue(':class_id', $update_array['class_id']);
        $statement-> bindValue(':make_id', $update_array['make_id']);
        $statement->execute();
        $statement->closeCursor();
    }
?>