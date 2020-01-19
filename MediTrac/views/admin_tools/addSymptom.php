<?php
    require 'db_queries.php';
    if(!isset($_SESSION)) { session_start();}
    // !isset($_SESSION) || 
    if(!isset($_SESSION['user'])) { header("Location:"."../login/login.php");}
    $name = $_POST["name"];
    $colour = $_POST["colour"];

    //$colours = array("#08d6b0","#a909b8","#156b07","#db0d66","#0d05a1","#0c0c0d","#a11010");
    insertSymptom(connect(),$_SESSION['user'],$name,$colour);
    // $_SESSION['user'] = $result['id'];

?>