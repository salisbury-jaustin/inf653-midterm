<?php 
    function is_valid_login($username, $password) {
        global $db;
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

    function userName_exists($username) {
        global $db;
        $query = 'select username from administrators
                    where username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $exists = $statement->rowCount();
        $statement->closeCursor();
        return $exists;
    }

    function add_admin($username, $password) {
        global $db;
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
?>