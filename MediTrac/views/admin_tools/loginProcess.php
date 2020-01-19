<?php

    require 'db_queries.php';

    if(!isset($_SESSION)) { session_start();}
    $email = $_POST["email"];
    $password = $_POST['password'];

   $result = (getUserFromLogin(connect(), $email,($password)));
   $_SESSION['user'] = $result['id'];
   $_SESSION['username'] = $result['userName'];
   header("Location:"."../../../index.php");
?>