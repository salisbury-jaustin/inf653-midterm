<?php 
class AdminDB {
    public static function is_valid_login($username, $password) {
        $db = Database::getDB();
        $query = 'select ID from administrators
                    where username = :username and password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $valid = $statement->rowCount();
        $statement->closeCursor();
        return $valid;
    }
    public static function userName_exists($username) {
        $db = Database::getDB();
        $query = 'select username from administrators
                    where username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $exists = $statement->rowCount();
        $statement->closeCursor();
        return $exists;
    }
    public static function add_admin($username, $password) {
        $db = Database::getDB();
        $query = 'insert into administrators
                    (username, password)
                    values
                    (:username, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>