<?php include '../view/admin/header.php'?>
<main class="admin_cmt">
    <div id="types_display" class="two_column_grid">
        <h5>Name</h5>
        <div></div>
        <?php foreach ($types as $type) : ?>
            <p><?php echo $type['type']?></p>
            <form action="./index.php" method="post">
                <input type="hidden" name="action" value="rmv_type"> 
                <button type="submit" name="type_id" value=<?php echo $type['type_id']?>>Remove</button>
            </form>
        <?php endforeach; ?>
    </div>
    <form action="./index.php" method="post">
        <input type="hidden" name="action" value="add_type">
        <label for="type">Name:</label>
        <input type="text" name="type">
        <button type="submit">Add</button>
    </form>
    <p><?php if (!empty($error_message)) {echo $error_message;}?></p>
</main>
<?php include '../view/admin/footer.php'?>