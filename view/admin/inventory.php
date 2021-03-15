<?php include '../view/admin/header.php'?>
<?php include '../view/global/filters.php'?>
    <div id="admin_inventory">
        <h5>Year</h5>
        <h5>Make</h5>
        <h5>Model</h5>
        <h5>Type</h5>
        <h5>Price</h5>
        <h5>Class</h5>
        <div></div>
        <?php foreach ($vehicles as $vehicle) : ?>
            <p><?php echo $vehicle['year'];?></p>
            <p><?php echo $vehicle['make'];?></p>
            <p><?php echo $vehicle['model'];?></p>
            <p><?php echo $vehicle['type'];?></p>
            <p><?php echo $vehicle['class'];?></p>
            <p><?php echo $vehicle['price'];?></p>
            <form action="../admin/index.php" method="post">
                <input type="hidden" name="action" value="rmv"/>
                <button type="submit" name="vehicle_id" value=<?php echo $vehicle['vehicle_id']?>>Remove</button>
            </form>
        <?php endforeach; ?>
    </div>
</main>
<?php include '../view/global/footer.php'?>