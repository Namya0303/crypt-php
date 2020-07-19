<?php
session_start();
require_once "config.php";
$id = $_SESSION['id'];


    $sql = "UPDATE users SET hintca = 1, points= points - 100 WHERE id=$id";
    // Prepare statement
    $stmt = $link->prepare($sql);
    // execute the query
    $stmt->execute();

    
    header('location: shop');


?>