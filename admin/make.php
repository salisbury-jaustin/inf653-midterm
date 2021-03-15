<?php
    require('../model/db.php');
    require('../model/vehicles.php');
    require('../model/classes.php');
    require('../model/makes.php');
    require('../model/types.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else {
        $action = 'makes';
    }

    if ($action == 'makes') {
        try {
            $makes = makes();
            include('../view/admin/makes.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../view/admin/error.php');
        }
    }

    else if ($action == 'rmv') {
        try {
            $make_id = filter_input(INPUT_POST, 'make_id', FILTER_SANITIZE_STRING);
            make_delete($make_id);
            $makes = makes();
            include('../view/admin/makes.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../view/admin/error.php');
        }
    }

    else if ($action == 'add') {
        try {
            $error_message = '';
            $make= filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
            if (!empty($make)) {
                make_add($make);
                $makes= makes();
                include('../view/admin/makes.php');
            } else {
                $error_message = "Must provide a class name!";
                $makes= makes();
                include('../view/admin/makes.php');
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../view/admin/error.php');
        }
    }
?>