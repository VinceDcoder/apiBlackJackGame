<?php
require_once "./SQL/sqlTools.php";
require_once "./validate.php";
$postTarget = htmlspecialchars($_SERVER['PHP_SELF']);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user;
    $errors = [];
    foreach($_POST as $key => $value){
        $user[$key] = cleanData($value);
    }
    if(!validName($user['name'])){
        $errors['name']= "Only use alphabet and numbers";
    }

    if(empty($errors)){
        addUser($user);
        console.log($user);
    }
}
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
