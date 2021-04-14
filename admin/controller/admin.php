<?php
    include('./util/valid_register.php');
    switch($action) {
        case 'show_register':
            include('../view/admin/register.php');
            break;
            
        case 'register':
            try {
                $errors = ValidRegister::valid_registration($username, $password, $confirm_password);

                if (count($errors) != 0) {
                    $error_message = $errors;
                } else {
                    $user_exists = AdminDB::userName_exists($username);
                    if ($user_exists != 0) {
                        $error = "Administrator username already exists.";
                        $error_message = array();
                        array_push($error_message, $error);
                    } else {
                        AdminDB::add_admin($username, $password);
                    }
                }
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../view/public/error.php');
                exit();
            }
            if (!empty($error_message)) {
                include('../view/admin/register.php');
            } else {
                header('Location: ?action=inventory');
            }
            break;

        case 'show_login':
            include('../view/admin/login.php');    
            break;

        case 'login':
            try {
                $valid = AdminDB::is_valid_login($username, $password);
                if ($valid == 1) {
                    $_SESSION['is_valid_admin'] = true;
                } else {
                    $error_message = "Not a valid user.";
                }
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../view/public/error.php');
                exit();
            }
            if (isset($_SESSION['is_valid_admin'])) {
                header('Location: .');
            } else {
                include('../view/admin/login.php');
            }
            break;

        case 'logout':
            /* end session */
            $_SESSION = array(); // unset session variables
            session_destroy(); // end session

            /* delete from client */
            $name = session_name(); // get the PHPSESSID
            $expire = strtotime('-1 year'); // set expiration date to past
            $params = session_get_cookie_params(); // get session params
            $path = $params['path'];
            $domain = $params['domain'];
            $secure = $params['secure'];
            $httponly = $params['httponly'];
            setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
            header('Location: .');
            break;
    } 
?>