<?php
    require('../model/db.php');
    require('../model/vehicles.php');
    require('../model/classes.php');
    require('../model/makes.php');
    require('../model/types.php');
    require('../model/admin_db.php');

    /* SESSION */
    $lifetime = 60 * 60 * 24 * 365;
    session_set_cookie_params($lifetime, '/');
    session_start();
    
    /* MODEL DATA */
    $classes = ClassesDB::classes();
    $makes = MakesDB::makes();
    $types = TypesDB::types();
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);
    /* END MODEL DATA */
    
    /* ACCESS CONTROL */
    include('./util/valid_admin.php');

    /* ROUTER START */
    if ($action == 'inventory' ||
        $action == 'rmv_vehicle' ||
        $action == 'sort') {
            include('./controller/inventory.php');
    }
    if ($action == 'display_add_form' ||
        $action == 'add_vehicle') {
            include('./controller/add_vehicle.php');
    }
    if ($action == 'display_classes' ||
        $action == 'add_class' ||
        $action == 'rmv_class') {
            include('./controller/class.php');
    } 
    if ($action == 'display_makes' ||
        $action == 'add_make' ||
        $action == 'rmv_make') {
            include('./controller/make.php');
    }
    if ($action == 'display_types' ||
        $action == 'add_type' ||
        $action == 'rmv_type') {
            include('./controller/type.php');
    }
    if ($action == 'show_register' ||
        $action == 'login' ||
        $action == 'show_login' ||
        $action == 'register' ||
        $action == 'logout') {
            include('./controller/admin.php');
        } 
?>
    