<?php
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!isset($_SESSION['is_valid_admin']) && !isset($action)) {
        $action = "show_login";
    } else if (!isset($_SESSION['is_valid_admin']) && isset($action)) {
        if ($action == 'login') {
            return $action;
        } else {
            $action = "show_login";
        }
    } else {
        if (!$action) {
            $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
            if (!$action) {
                $action = 'inventory';
            }
        }
    }
?>
