<?php

require_once './config.php';

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

function closeConnection($conn){
    if(!mysqli_close($conn)){
        die(mysqli_error($conn) . "\n");
    }
}
?>