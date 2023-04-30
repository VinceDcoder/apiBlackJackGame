<?php

require_once './sqlTools.php';

$conn = getConnection();

$sql = 'DROP TABLE product;';

if(mysqli_query($conn,$sql)){
    echo "Product table dropped successfully\n";
}
else{
    die(mysqli_error($conn) . "\n");
}

closeConnection($conn);

?>