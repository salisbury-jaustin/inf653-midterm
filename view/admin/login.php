        <h5>Please fill in your credentials to login.</h5>
        <form action="./index.php" method="post">
            <input type="hidden" name="action" value="login"/>
            <label for="username">Username:</label>
            <input type="text" name="username"/>
            <label for="password">Password:</label>
            <input type="text" name="password"/>
            <button type="submit">Sign In</button>
        </form>
        <?php if (isset($error_message)) : ?>
            <p><?php echo $error_message?></p>
        <?php endif; ?>
    </main>
    </body>
    </html>