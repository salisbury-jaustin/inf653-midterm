<?php
    switch ($action) {
        case 'display_makes': 
            include('../view/admin/makes.php');
            break;
        case 'rmv_make':
            try {
                $make_id= filter_input(INPUT_POST, 'make_id', FILTER_SANITIZE_STRING);
                MakesDB::make_delete($make_id);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../view/admin/error.php');
                exit();
            }
            header('Location: .?action=display_makes');
            break;
        case 'add_make':
            try {
                $error_message = '';
                $make = filter_input(INPUT_POST, 'make', FILTER_SANITIZE_STRING);
                if (!empty($make)) {
                    MakesDB::make_add($make);
                } else {
                    $error_message = "Must provide a make name!";
                }
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../view/admin/error.php');
                exit();
            }
            header('Location: .?action=display_makes');
            break;

    }
?>