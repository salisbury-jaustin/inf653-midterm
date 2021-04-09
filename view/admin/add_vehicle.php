<?php include('../view/admin/header.php'); ?>
    <main>
        <div id="admin_add">
            <h2>Add Vehicle</h2>
            <form action="." method="post">
                <input type="hidden" name="action" value="add_vehicle"/>
                <label for="select_make">Make:</label>
                <select id="select_make" name="make_id">
                    <option value="">
                    </option>
                    <?php foreach ($makes as $make) :?>
                        <option value="<?php echo $make['make_id']?>">
                            <?php echo $make['make'];?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="select_type">Type:</label>
                <select id="select_type" name="type_id">
                    <option value="">
                    </option>
                    <?php foreach ($types as $type) :?>
                        <option value="<?php echo $type['type_id']?>">
                            <?php echo $type['type'];?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="select_class">Class:</label>
                <select id="select_class" name="class_id">
                    <option value="">
                    </option>
                    <?php foreach ($classes as $class) :?>
                        <option value="<?php echo $class['class_id']?>">
                            <?php echo $class['class'];?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="select_year">Year:</label>
                <select id="select_year" name="year">
                    <option value="">
                    </option>
                    <?php foreach($years as $year) : ?>
                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="model">Model:</label>
                <input type="text" name="model"/>
                <label for="price">Price:</label>
                <input type="number" name="price"/>
                <button type="submit">Add Vehicle</button>
            </form>
            <p><?php if (!empty($error_message)) {echo $error_message;} ?></p>
        </div>
    </main>
<?php include('../view/admin/footer.php'); ?>