<?php include('../view/admin/header.php');?>
        <h5>Register a new admin user:</h5>
        <form action="./index.php" method="post">
            <input type="hidden" name="action" value="register"/>
            <label for="username">Username:</label>
            <input type="text" name="username"/>
            <label for="password">Password:</label>
            <input type="text" name="password"/>
            <label for="confirm_password">Confirm Password:</label>
            <input type="text" name="confirm_password"/>
            <button type="submit">Sign In</button>
        </form>
        <?php if (!empty($error_message)) : ?>
            <?php foreach ($error_message as $value) : ?>
                <p><?php echo $value ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
<?php include('../view/global/footer.php')?>
