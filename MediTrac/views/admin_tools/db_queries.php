<?php

try {
    $conn = new PDO("mysql:host=34.94.246.220;dbname=meditrac", "root", "qwerty1");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    die();
    }

    echo getUserFromLogin('jane@doe.ca','passy')['id'];

    function getUserFromLogin($email, $password){
        $sql = "SELECT * FROM user WHERE \"email\" = $email AND \"password\" = $password";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch(); // assumed to be a single return value
    }

    
?>