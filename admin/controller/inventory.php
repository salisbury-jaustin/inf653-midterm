<?php
    switch($action) { 
        case 'inventory':
            try {
                if (!isset($vehicles)) {
                    $vehicles = vehicles_default();
                }
                include('../view/admin/inventory.php');
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../view/admin/error.php');
                exit();
            }
            break;
        case 'sort':
            if (empty($_POST['make_id']) && empty($_POST['type_id']) && empty($_POST['class_id'])) {
                try {
                    $radio_filtered = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_STRING);
                    if ($radio_filtered == 'price') {
                        $vehicles = vehicles_default();
                    } else {
                        $vehicles = vehicles_radio_year();
                    }
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    include('../view/admin/error.php');
                    exit();
                }
            }
            // sort by make
            else if (!empty($_POST['make_id']) && empty($_POST['type_id']) && empty($_POST['class_id'])) {
                try {
                    $radio_filtered = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_STRING);
                    $id_filtered = filter_input(INPUT_POST, 'make_id', FILTER_SANITIZE_NUMBER_INT); 
                    if ($radio_filtered == 'price') {
                        $vehicles = vehicles_make_default($id_filtered);
                    } else {
                        $vehicles = vehicles_make_byYear($id_filtered);
                    }
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    include('../view/admin/error.php');
                    exit();
                }
            }
            // sort by type
            else if (empty($_POST['make_id']) && !empty($_POST['type_id']) && empty($_POST['class_id'])) {
                try {
                    $radio_filtered = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_STRING);
                    $id_filtered = filter_input(INPUT_POST, 'type_id', FILTER_SANITIZE_NUMBER_INT);
                    if ($radio_filtered == 'price') {
                        $vehicles = vehicles_type_default($id_filtered);
                    } else {
                        $vehicles = vehicles_type_byYear($id_filtered);
                    }
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    include('../view/admin/error.php');
                    exit();
                }
            }
            // sort by class
            else if (empty($_POST['make_id']) && empty($_POST['type_id']) && !empty($_POST['class_id'])) {
                try {
                    $radio_filtered = filter_input(INPUT_POST, 'radio', FILTER_SANITIZE_STRING);
                    $id_filtered = filter_input(INPUT_POST, 'class_id', FILTER_SANITIZE_NUMBER_INT);
                    if ($radio_filtered == 'price') {
                        $vehicles = vehicles_class_default($id_filtered);
                    } else {
                        $vehicles = vehicles_class_byYear($id_filtered);
                    }
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    include('../view/admin/error.php');
                    exit();
                }
            }
            // prevents sorting by multiple categories
            else {
                try {
                    $error_message = "You may only sort by one category at a time!";
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    include('../view/admin/error.php');
                    exit();
                }
            }
            include('../view/admin/inventory.php');
            break;
        case 'rmv_vehicle':
            try {
                $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_SANITIZE_NUMBER_INT);
                vehicles_delete($vehicle_id);
                } catch (PDOException $e) {
                    $error_message = $e->getMessage();
                    include('../view/admin/error.php');
                    exit();
                }
                header('Location: .?action=inventory');
                break;
    }
?>