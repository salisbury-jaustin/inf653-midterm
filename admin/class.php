<?php
    require('../model/db.php');
    require('../model/vehicles.php');
    require('../model/classes.php');
    require('../model/makes.php');
    require('../model/types.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else {
        $action = 'classes';
    }

    if ($action == 'classes') {
        try {
            $classes= classes();
            include('../view/admin/classes.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../view/admin/error.php');
        }
    }

    else if ($action == 'rmv') {
        try {
            $class_id = filter_input(INPUT_POST, 'class_id', FILTER_SANITIZE_STRING);
            class_delete($class_id);
            $classes = classes();
            include('../view/admin/classes.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../view/admin/error.php');
        }
    }

    else if ($action == 'add') {
        try {
            $error_message = '';
            $class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);
            if (!empty($class)) {
                class_add($class);
                $classes= classes();
                include('../view/admin/classes.php');
            } else {
                $error_message = "Must provide a class name!";
                $classes= classes();
                include('../view/admin/classes.php');
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../view/admin/error.php');
        }
    }
?>