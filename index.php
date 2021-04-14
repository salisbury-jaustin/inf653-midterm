<?php
    require('./model/db.php');
    require('./model/vehicles.php');
    require('./model/classes.php');
    require('./model/makes.php');
    require('./model/types.php');
    
    /* GLOBAL VARIABLES */
    $display_heading = true;
    
    /* SESSION */
    $lifetime = 60 * 60 * 24 * 365;
    session_set_cookie_params($lifetime, '/');
    session_start();

    if (empty($_SESSION['firstname'])) {
        $_SESSION['firstname'] = '';
    }
    /* END OF SESSION */

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } elseif (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'inventory';
    }

    /* POST ACTIONS */
    // default public inventory display
    if ($action == 'inventory') {
        try {
            $vehicles = VehiclesDB::vehicles_default();
            $classes = ClassesDB::classes();
            $makes = MakesDB::makes();
            $types = TypesDB::types();
            include('./view/public/inventory.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('./view/public/error.php');
        }
    }

    // logout of session
    elseif ($action == 'logout') {
        /* output */
        $display_heading = false; // setting display_heading to false prevents register/logout form from being displayed in the header
        $user = $_SESSION['firstname'];
        include('./view/public/logout.php');

        /* end session */
        $_SESSION = array(); // unset session variables
        session_destroy(); // end session

        /* delete from client */
        $name = session_name(); // get the PHPSESSID
        $expire = strtotime('-1 year'); // set expiration date to past
        $params = session_get_cookie_params(); // get session params
        $path = $params['path'];
        $domain = $params['domain'];
        $secure = $params['secure'];
        $httponly = $params['httponly'];
        setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
    } 

    // register user
    elseif ($action == 'register') {
        $display_heading = false; // setting display_heading to false prevents register/logout form from being displayed in the header
        include('./view/public/register.php');
    }

    // sorted public inventory  
    else if ($action == 'sort') {
        // sorted only by radio value
        if (empty($_POST['make_id']) && empty($_POST['type_id']) && empty($_POST['class_id'])) {
            try {
                $radio_filtered = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_STRING);
                if ($radio_filtered == 'price') {
                    $vehicles = VehiclesDB::vehicles_default();
                } else {
                    $vehicles = VehiclesDB::vehicles_radio_year();
                }
                $classes = ClassesDB::classes();
                $makes = MakesDB::makes();
                $types = TypesDB::types();
                include('./view/public/inventory.php');
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./view/public/error.php');
            }
        }
        else if (!empty($_POST['make_id']) && empty($_POST['type_id']) && empty($_POST['class_id'])) {
            try {
                $radio_filtered = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_STRING);
                $id_filtered = filter_input(INPUT_POST, 'make_id', FILTER_SANITIZE_NUMBER_INT); 
                if ($radio_filtered == 'price') {
                    $vehicles = VehiclesDB::vehicles_make_default($id_filtered);
                } else {
                    $vehicles = VehiclesDB::vehicles_make_byYear($id_filtered);
                }
                $classes = ClassesDB::classes();
                $makes = MakesDB::makes();
                $types = TypesDB::types();
                include('./view/public/inventory.php');
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./view/public/error.php');
            }
        }
        else if (empty($_POST['make_id']) && !empty($_POST['type_id']) && empty($_POST['class_id'])) {
            try {
                $radio_filtered = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_STRING);
                $id_filtered = filter_input(INPUT_POST, 'type_id', FILTER_SANITIZE_NUMBER_INT);
                if ($radio_filtered == 'price') {
                    $vehicles = VehiclesDB::vehicles_type_default($id_filtered);
                } else {
                    $vehicles = VehiclesDB::vehicles_type_byYear($id_filtered);
                }
                $classes = ClassesDB::classes();
                $makes = MakesDB::makes();
                $types = TypesDB::types();
                include('./view/public/inventory.php');
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./view/public/error.php');
            }
        }
        else if (empty($_POST['make_id']) && empty($_POST['type_id']) && !empty($_POST['class_id'])) {
            try {
                $radio_filtered = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_STRING);
                $id_filtered = filter_input(INPUT_POST, 'class_id', FILTER_SANITIZE_NUMBER_INT);
                if ($radio_filtered == 'price') {
                    $vehicles = VehiclesDB::vehicles_class_default($id_filtered);
                } else {
                    $vehicles = VehiclesDB::vehicles_class_byYear($id_filtered);
                }
                $classes = ClassesDB::classes();
                $makes = MakesDB::makes();
                $types = TypesDB::types();
                include('./view/public/inventory.php');
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./view/public/error.php');
            }
        }
        else {
            try {
                $error_message = "You may only sort by one category at a time!";
                $vehicles = VehiclesDB::vehicles_default();
                $classes = ClassesDB::classes();
                $makes = MakesDB::makes();
                $types = TypesDB::types();
                include('./view/public/inventory.php');
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./view/public/error.php');
            }
        }
    } 
    /* END OF POST ACTIONS */

    /* GET ACTIONS */
    elseif ($action == 'create_user') {
        $display_heading = false;
        $firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
        if (!empty($firstname)) {
            $_SESSION['firstname'] = $firstname;
            include('./view/public/register.php');
        } else {
            $error_message = "Enter your first name to register.";
            include('./view/public/register.php');
        }
    }
    /* END OF GET ACTIONS */
?>