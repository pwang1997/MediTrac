<?php

try {
    $conn = new PDO("mysql:host=34.94.246.220;dbname=meditrac", "root", "qwerty1");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    die()
    }
$sql = "SELECT userName FROM user";
$stmt = $conn->prepare($sql);
    $stmt->execute();

    // set the resulting array to associative
    $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while($result = $results->fetch()){
        echo $result['userName'];
    }

    
?>