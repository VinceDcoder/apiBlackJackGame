<?php
    function cleanData($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function validName($name){
        return preg_match('/^[a-zA-Z0-9\ ]*$/', $vendor);
    }
    
?>