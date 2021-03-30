<main>
    <div class="global_filter">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="sort"/>
            <div id="select_inputs">
                <select id="select_make" name="make_id">
                    <option value="">
                        All Makes
                    </option>
                    <?php foreach ($makes as $make) :?>
                        <option value=<?php echo $make['make_id']?>>
                            <?php echo $make['make'];?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <select id="select_type" name="type_id">
                    <option value="">
                        All Types
                    </option>
                    <?php foreach ($types as $type) :?>
                        <option value=<?php echo $type['type_id']?>>
                            <?php echo $type['type'];?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <select id="select_class" name="class_id">
                    <option value="">
                        All Classes
                    </option>
                    <?php foreach ($classes as $class) :?>
                        <option value=<?php echo $class['class_id']?>>
                            <?php echo $class['class'];?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="filter_form_submit">
                <div>
                    <label for="price_radio">Sort by: </label>
                    <input type="radio" id="price_radio" name="radio" value="price" checked="checked">
                    <label for="price_radio">Price</label>
                    <input type="radio" id="year_radio" name="radio" value="year">
                    <label for="year_radio">Year</label>
                </div>
                <button type="submit">Filter</button>
            </div>
        </form>
    </div>