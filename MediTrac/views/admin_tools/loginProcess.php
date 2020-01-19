<?php

    require 'db_queries.php';


    $email = $_POST["email"];
    $password = $_POST['password'];

   $result = (getUserFromLogin(connect(), $email,($password)));

   $_SESSION['user'] = $result['id'];
    echo "<script>console.log(".$_SESSION['user'].")</script>";
   header("Location:"."../../../index.php");
?>