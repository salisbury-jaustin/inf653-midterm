<?php
    require('./model/db.php');
    require('./model/vehicles.php');
    require('./model/classes.php');
    require('./model/makes.php');
    require('./model/types.php');

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else {
        $action = 'inventory';
    }

    // default public inventory display
    if ($action == 'inventory') {
        try {
            $vehicles = vehicles_default();
            $classes = classes();
            $makes = makes();
            $types = types();
            include('./view/public/inventory.php');
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('./view/public/error.php');
        }
    }
    // sorted public inventory  
    else if ($action == 'sort') {
        // sorted only by radio value
        if (empty($_POST['make_id']) && empty($_POST['type_id']) && empty($_POST['class_id'])) {
            try {
                $radio_filtered = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_STRING);
                if ($radio_filtered == 'price') {
                    $vehicles = vehicles_default();
                } else {
                    $vehicles = vehicles_radio_year();
                }
                $classes = classes();
                $makes = makes();
                $types = types();
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
                    $vehicles = vehicles_make_default($id_filtered);
                } else {
                    $vehicles = vehicles_make_byYear($id_filtered);
                }
                $classes = classes();
                $makes = makes();
                $types = types();
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
                    $vehicles = vehicles_type_default($id_filtered);
                } else {
                    $vehicles = vehicles_type_byYear($id_filtered);
                }
                $classes = classes();
                $makes = makes();
                $types = types();
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
                    $vehicles = vehicles_class_default($id_filtered);
                } else {
                    $vehicles = vehicles_class_byYear($id_filtered);
                }
                $classes = classes();
                $makes = makes();
                $types = types();
                include('./view/public/inventory.php');
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./view/public/error.php');
            }
        }
        else {
            try {
                $error_message = "You may only sort by one category at a time!";
                $vehicles = vehicles_default();
                $classes = classes();
                $makes = makes();
                $types = types();
                include('./view/public/inventory.php');
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('./view/public/error.php');
            }
        }
    }
?>