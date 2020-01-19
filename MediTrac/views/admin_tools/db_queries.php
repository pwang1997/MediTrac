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

    echo "<p>".getUserFromLogin($con,'jane@doe.ca','passy')['id']."</p>";
    foreach(getSymptomsFromUser($con,2) as $row){
        echo "<p>" .$row['name'] . "</p>";
    }
    function getUserFromLogin($con, $email, $password){
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        return executeSql($con,$sql)->fetch();
    }
    function getSymptomsFromUser($con,$userId){
        $sql = "SELECT * FROM symptom WHERE userId = $userId";
        return executeSql($con,$sql)->fetchAll();
    }

    function executeSql($con, $sql){
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }
    
?>