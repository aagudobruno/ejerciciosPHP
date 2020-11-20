<?php 
    $host = "localhost";
    $db_name = "php_beginner_crud_level_1";
    $username = "aagudo";
    $password = "0076Vaab";
    try{
        $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    }catch(PDOException $exception){
        echo "Connection error: ".$exception->getMessage();
    }
?>