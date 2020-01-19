<?php

    require 'db_queries.php';


    $email = $_POST["email"];
    $password = $_POST['password'];

   $result = (getUserFromLogin($con, $email,($password)));

   $_SESSION['user'] = $result['id'];

   header("Location:"."/html/index.php");