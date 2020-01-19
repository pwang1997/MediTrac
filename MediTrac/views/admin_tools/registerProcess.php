<?php

    require 'db_queries.php';

    if(!isset($_SESSION)) { session_start();}
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST['password'];

    $con = connect();
   insertUser($con, $username,$email,$password);
   $result = getUserFromLogin($con,$email,$password);
   $_SESSION['user'] = $result['id'];
   $con = null;
   header("Location:"."../../../index.php");
?>