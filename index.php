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



<form action="blackjack.php" method="post">
<label for="user">Enter Your Name</label><br>
<input type="text" name="user" required><br> 

<input type="submit">
</form>

<div>

</div>

</body>
</html>
