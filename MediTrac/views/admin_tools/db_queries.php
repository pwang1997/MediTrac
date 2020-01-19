<?php

try{
$mysqli = new mysqli("34.94.246.220", "root", "qwerty1", "peaceful-berm-265521:us-west2:meditrac");
$sql = "SELECT userName FROM user";
if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, the website is experiencing problems.";

    // Again, do not do this on a public site, but we'll show you how
    // to get the error information
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}
$result->fetch_assoc();

echo($result['email']);
}catch(Exception $e){
    echo $e->getMessage;
}


?>