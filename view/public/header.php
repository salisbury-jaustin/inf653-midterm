<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Zippy Used Autos</title>
</head>
<body class="theme1">
    <header class="public_header">
        <h1>
            Zippy Used Autos
        </h1>
        <div class="utilities">
            <?php if ($display_heading == true) : ?> 
                <?php if (!empty($_SESSION['firstname'])) : ?>
                    <p>
                        Welcome, <?php echo $_SESSION['firstname'] ?>!
                    </p> 
                    <form action="./index.php" method="post">
                        <button type="submit" name="action" value="logout">Logout</button>
                    </form>
                <?php else: ?>
                    <form action="./index.php" method="post">
                        <button type="submit" name="action" value="register">Register</button>
                    </form>
                <? endif ?>
            <?php endif ?>
        </div>
    </header>