<?php 
    require_once ("./SQL/sqlTools.php");

?>

<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link type="text/css" rel="stylesheet" href="./blackjack.css">
    </head>
</html>
<body>  

    <h1 id="name"> Jack Black's Blackjack</h1>
    <div id="play">
    <a href="index.php">PLAY</a>      
      
</div>

<?php
    //Generate highscores
    $scores = getScores();
    foreach($scores as $s){
        echo "<div class='scores'>";
        foreach($s as $key => $value){
            echo "$value<br>";
        }
        echo "</div>";
    }
?>

</body>