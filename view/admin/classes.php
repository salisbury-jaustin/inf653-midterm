<?php include '../view/admin/header.php'?>
<main class="admin_cmt">
    <div id="classes_display" class="two_column_grid">
        <h5>Name</h5>
        <div></div>
        <?php foreach ($classes as $class) : ?>
            <p><?php echo $class['class']?></p>
            <form action="./class.php" method="post">
                <input type="hidden" name="action" value="rmv"> 
                <button type="submit" name="class_id" value=<?php echo $class['class_id']?>>Remove</button>
            </form>
        <?php endforeach; ?>
    </div>
    <form action="./class.php" method="post">
        <input type="hidden" name="action" value="add">
        <label for="class">Name:</label>
        <input type="text" name="class">
        <button type="submit">Add</button>
    </form>
    <p><?php if (!empty($error_message)) {echo $error_message;}?></p>
</main>
<?php include '../view/global/footer.php'?>