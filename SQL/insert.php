<?php

require_once './sqlTools.php';

$internalId = '1234-ABCD';
$name = 'Widget';
$vendor = 'Bob\'s Widgets';
$vendorPhone = '555-555-5555';
$quantity = 35;
$lastPurchased = date("Y-m-d H:i:s");

$conn = getConnection();

$insertQry = <<<QUERY
INSERT INTO product
(internalId, name, vendor, vendorPhone, quantity, lastPurchased)
VALUES(?,?,?,?,?,?)
QUERY;

$insertStatement = mysqli_prepare($conn,$insertQry);

mysqli_stmt_bind_param($insertStatement, 
                        'ssssis', 
                        $internalId, $name, $vendor, $vendorPhone, $quantity, $lastPurchased
);

if(mysqli_stmt_execute($insertStatement)){
    echo("Record inserted successfully\n");
}
else{
    die(mysqli_error($conn) . "\n");
}

closeConnection($conn);

?>