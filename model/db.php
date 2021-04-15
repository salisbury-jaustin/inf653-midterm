<?php
class Database {
    private static $dsn = 'mysql:host=pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=iasqxmesm0vc2u5a';
    private static $username = 'f2qt8i85psvmhrmg';
    private static $password = 'lqzwcg9s6c7r2zbk';
    private static $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    private static $db;

    /*
    private static $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    private static $user = 'developer';
    private static $password = 'Homosapien1990!';
    private static $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // sets error mode for PDO
    private static $db;
    */

    private function _construct() {}

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                    self::$username,
                                    self::$password,
                                    self::$option);
            } catch (PDOException $e) {
                $errmssg = $e->getMessage();
                include('./view/public/error.php');
                exit();
            }
        }
        return self::$db;
    }
}
    /*
    $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $user = 'root';
    $password = '';
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // sets error mode for PDO
    */
?>