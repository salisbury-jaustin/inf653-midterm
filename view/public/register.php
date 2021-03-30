<?php include './view/public/header.php'; ?>
<main class="utility_style">
    <?php if (empty($_SESSION['firstname'])) : ?>
        <form action="./index.php" method="get">
            <input type="hidden" name="action" value="create_user"/>
            <label for=firstname>Please enter your first name:</label>
            <input type="text" name="firstname"/>
            <button type="submit">Enter</button>
        </form>
        <?php if (!empty($error_message)) : ?>
            <p>
                <?php echo $error_message ?>
            </p>
        <?php endif ?>
    <?php else : ?>
        <h2>
            Thank you for registering, <?php echo $_SESSION['firstname'] ?>!
        </h2>
        <p>
            <a href="./index.php">Click here</a> to view our inventory.
        </p>
    <?php endif ?>
</main>
<?php include './view/global/footer.php'; ?>