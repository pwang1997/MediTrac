<?php
    require 'db_queries.php';

    if(!isset($_SESSION) || !isset($_SESSION['user'])) { header("Location:"."../login/login.php");}
    $name = $_POST["name"];

    $colours = array("#08d6b0","#a909b8","#156b07","#db0d66","#0d05a1","#0c0c0d","#a11010");
    insertSymptom(connect(),$_SESSION['user'],$name,$colours[array_rand($colours)]);
    $_SESSION['user'] = $result['id'];

?>