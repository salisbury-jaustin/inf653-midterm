<?php include './view/public/header.php'; ?>
<?php include './view/global/filters.php'; ?>
    <?php if (!empty($error_message)) : ?>  
        <p id="inv_error"><?php echo $error_message;?></p>
    <?php endif ?>    
    <div id="public_inventory">
        <h5>Year</h5>
        <h5>Make</h5>
        <h5>Model</h5>
        <h5>Type</h5>
        <h5>Class</h5>
        <h5>Price</h5>
        <?php foreach ($vehicles as $vehicle) : ?>
            <p><?php echo $vehicle['year'];?></p>
            <p><?php echo $vehicle['make'];?></p>
            <p><?php echo $vehicle['model'];?></p>
            <p><?php echo $vehicle['type'];?></p>
            <p><?php echo $vehicle['class'];?></p>
            <p><?php echo $vehicle['price'];?></p>
        <?php endforeach; ?>
    </div>
</main>
<?php include './view/global/footer.php'; ?>