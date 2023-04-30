<?php

require_once './sqlTools.php';

$conn = getConnection();

$sql = <<< QUERY
CREATE TABLE blackjackScores(
    id int unsigned NOT NULL auto_increment,
    name varchar(255) NOT NULL,
    highScore varchar(20) NOT NULL
);
QUERY;

if(mysqli_query($conn,$sql)){
    echo "Product table created successfully \n";
}
else{
    die(mysqli_error($conn) . "\n");
}

closeConnection($conn);

?>