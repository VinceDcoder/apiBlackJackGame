<?php
require_once "./SQL/sqlTools.php";

?>

<html>
    <head>
        <title>Homepage</title>
        <link type="text/css" rel="stylesheet" href="./style.css">
    </head>

    <body>

        <ul class="navbar">
            <a href="./highscores.php">High Scores</a></li> 
        </ul>

        <form action="./blackjack.php" method="post">
            <label for="name">Enter Your Name</label><br>
            <input type="text" name="name"  value="<?=$user['name'] ?>" required><?= $errors['name'] ?><br> 
            <input type="submit">
        </form>

        <div>

        </div>

    </body>
</html>
