<?php
    // parameters for php data object
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $user = 'root';
    $password = '';
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // sets error mode for PDO

    // initialize the PDO
    try {
        $db = new PDO($dsn, $user, $password, $option);
    } catch (PDOException $e) {
        $errmssg = $e->getMessage();
        include('./view/public/error.php');
        exit();
    }
?>