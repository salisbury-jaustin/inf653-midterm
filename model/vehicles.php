<?php 
class VehiclesDB {
    public static function vehicles_default() {
        $db = Database::getDB();
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
    public static function vehicles_radio_year() {
        $db = Database::getDB();
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
    public static function vehicles_type_default($type_id) {
        $db = Database::getDB();
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
    public static function vehicles_type_byYear($type_id) {
        $db = Database::getDB();
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
    public static function vehicles_class_default($class_id) {
        $db = Database::getDB();
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
    public static function vehicles_class_byYear($class_id) {
        $db = Database::getDB();
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
    public static function vehicles_make_default($make_id) {
        $db = Database::getDB();
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
    public static function vehicles_make_byYear($make_id) {
        $db = Database::getDB();
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
    public static function vehicles_delete($vehicle_id) {
        $db = Database::getDB();
        $query = 'delete from vehicles
                    where vehicle_id = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statement->closeCursor();
    }
    public static function vehicles_add($add_array) {
        $db = Database::getDB();
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
}
?>