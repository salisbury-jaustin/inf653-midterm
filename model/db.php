<?php
    // parameters for php data object
    $dsn = 'mysql:host=pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=iasqxmesm0vc2u5a';
    $user = 'f2qt8i85psvmhrmg';
    $password = 'lqzwcg9s6c7r2zbk';
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