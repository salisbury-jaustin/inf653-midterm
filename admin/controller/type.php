<?php
    switch ($action) {
        case 'display_types': 
            include('../view/admin/types.php');
            break;
        case 'rmv_type':
            try {
                $type_id = filter_input(INPUT_POST, 'type_id', FILTER_SANITIZE_STRING);
                type_delete($type_id);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../view/admin/error.php');
                exit();
            }
            header('Location: .?action=display_types');
            break;
        case 'add_type':
            try {
                $error_message = '';
                $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
                if (!empty($type)) {
                    type_add($type);
                } else {
                    $error_message = "Must provide a type name!";
                    header('.?action=display_types');
                }
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../view/admin/error.php');
                exit();
            }
            header('Location: .?action=display_types');
            break;
    }
?>