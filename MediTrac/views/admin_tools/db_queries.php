<?php

try {
    $con = new PDO("mysql:host=34.94.246.220;dbname=meditrac", "root", "qwerty1");
    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    die();
    }

    echo getUserFromLogin($con,'jane@doe.ca','passy')['id'];

    function getUserFromLogin($con, $email, $password){
        $sql = "SELECT * FROM user WHERE \"email\" = '$email' AND \"password\" = '$password'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch(); // assumed to be a single return value
    }

    
?>