<?php

    require 'db_queries.php';


    $email = $_POST["email"];
    $password = $_POST['password'];

   $result = (getUserFromLogin(connect(), $email,($password)));
    echo $result;
   $_SESSION['user'] = $result['id'];
    echo $_SESSION['user'];
   //header("Location:"."../../../index.php");
?>