<?php include '../view/admin/header.php'?>
<main class="admin_cmt">
    <div id="makes_display" class="two_column_grid">
        <h5>Name</h5>
        <div></div>
        <?php foreach ($makes as $make) : ?>
            <p><?php echo $make['make']?></p>
            <form action="./index.php" method="post">
                <input type="hidden" name="action" value="rmv_make"> 
                <button type="submit" name="make_id" value=<?php echo $make['make_id']?>>Remove</button>
            </form>
        <?php endforeach; ?>
    </div>
    <form action="./index.php" method="post">
        <input type="hidden" name="action" value="add_make">
        <label for="make">Name:</label>
        <input type="text" name="make">
        <button type="submit">Add</button>
    </form>
    <p><?php if (!empty($error_message)) {echo $error_message;}?></p>
</main>
<?php include '../view/admin/footer.php'?>