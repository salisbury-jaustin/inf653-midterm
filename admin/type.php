<?php
    require('../model/db.php');
    require('../model/vehicles.php');
    require('../model/classes.php');
    require('../model/makes.php');
    require('../model/types.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else {
        $action = 'types';
    }

    if ($action == 'types') {
        try {
            $types= types();
            include('../view/admin/types.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../view/admin/error.php');
        }
    }

    else if ($action == 'rmv') {
        try {
            $type_id = filter_input(INPUT_POST, 'type_id', FILTER_SANITIZE_STRING);
            type_delete($type_id);
            $types = types();
            include('../view/admin/types.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../view/admin/error.php');
        }
    }

    else if ($action == 'add') {
        try {
            $error_message = '';
            $type= filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
            if (!empty($type)) {
                type_add($type);
                $types= types();
                include('../view/admin/types.php');
            } else {
                $error_message = "Must provide a class name!";
                $types= types();
                include('../view/admin/types.php');
            }
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../view/admin/error.php');
        }
    }
?>