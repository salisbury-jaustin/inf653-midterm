<?php
    switch ($action) {
        case 'display_classes': 
            include('../view/admin/classes.php');
            break;
        case 'rmv_class':
            try {
                $class_id = filter_input(INPUT_POST, 'class_id', FILTER_SANITIZE_STRING);
                class_delete($class_id);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../view/admin/error.php');
                exit();
            }
            header('Location: .?action=display_classes');
            break;
        case 'add_class':
            try {
                $error_message = '';
                $class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);
                if (!empty($class)) {
                    class_add($class);
                } else {
                    $error_message = "Must provide a class name!";
                }
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../view/admin/error.php');
                exit();
            }
            header('Location: .?action=display_classes');
            break;

    }
?>