<?php
    $years = range(1900, strftime("%Y", time()));

    switch($action) {
        case 'display_add_form': 
            include('../view/admin/add_vehicle.php');
            break;
        case 'add_vehicle': 
            $error_message = "";

            // checks if any post values are empty
            foreach ($_POST as $key => $value) {
                if (empty($value)) {
                    $error_message = "Each field must have a value!"; // set error message
                    break; // break from add action
                } else {
                    continue;
                }
            }
            if (empty($error_message)) { // if the error message is empty, filter inputs and add to db
                $make_id = filter_input(INPUT_POST, 'make_id', FILTER_SANITIZE_NUMBER_INT);
                $type_id = filter_input(INPUT_POST, 'type_id', FILTER_SANITIZE_NUMBER_INT);
                $class_id = filter_input(INPUT_POST, 'class_id', FILTER_SANITIZE_NUMBER_INT);
                $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);
                $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);

                $add_array = array('make_id' => $make_id,
                                'type_id' => $type_id,
                                'class_id' => $class_id, 
                                'year' => $year, 
                                'model' => $model, 
                                'price' => $price);

                VehiclesDB::vehicles_add($add_array);
            } else {
                $error_message = $e->getMessage();
                include('../view/admin/error.php');
                exit();
            }
            header('Location: .');
            break;
    }
?>