<?php

    require 'db_queries.php';


    $email = $_POST["email"];
    $password = $_POST['password'];

   $result = (getUserFromLogin(connect(), $email,($password)));
   $_SESSION['user'] = $result['id'];
    echo isset($_SESSION['user']) ? $_SESSION['user'] : "SESSION USER NOT SET";
   //header("Location:"."../../../index.php");
?>