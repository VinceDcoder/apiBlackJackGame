<?php
require_once("config.php");

function getConnection(){
    global $servername,$username,$password,$dbname;
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        die(mysqli_error() . "\n");
    }
    else{
        return $conn;
    }
}
//comments
function closeConnection($conn){
    if(!mysqli_close($conn)){
        die(mysqli_error($conn) . "\n");
    }
}
function addUser($user){
    $conn = getConnection();
    $insertQry = <<<QUERY
    INSERT INTO blackjackScores (name)
    VALUES(?)
    QUERY;

    $insertStatement = mysqli_prepare($conn,$insertQry);

    mysqli_stmt_bind_param($insertStatement, 's', $user['name']);

    if(mysqli_stmt_execute($insertStatement)){
        echo("record inserted succesfully\n");
    }else{
        die(mysqli_error($conn) . "\n");
    }

    closeConnection($conn);
}

//Insert highscore statement
function addScore($score){
    $conn = getConnection();
    $insertQry = <<<QUERY
    UPDATE blackjackScores set highScore=? order by createdAt DESC limit 1
    QUERY;

    $insertStatement = mysqli_prepare($conn,$insertQry);

    mysqli_stmt_bind_param($insertStatement, 's',$score);

    if(mysqli_stmt_execute($insertStatement)){
        echo("record inserted succesfully\n");
    }else{
        die(mysqli_error($conn) . "\n");
    }

    closeConnection($conn);
}


function getScores(){
    $conn = getConnection();
    $getQry = <<<QUERY
    SELECT name, highScore from blackjackScores
    ORDER BY highScore DESC 
    LIMIT 21;
    QUERY;

    $getStatement = mysqli_prepare($conn, $getQry);
    mysqli_stmt_execute($getStatement);
    $result = mysqli_stmt_get_result($getStatement);
    $scores = [];
    while($row = mysqli_fetch_assoc($result)){
        array_push($scores, $row);
    }
    return $scores;

    closeConnection($conn);
}  


?>
