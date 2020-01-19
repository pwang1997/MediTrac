<?php

    function connect(){
    try {
        $con = new PDO("mysql:host=34.94.246.220;dbname=meditrac", "root", "qwerty1");
        // set the PDO error mode to exception
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        die();
    }
        return $con;
    }

    //SELECT
    function getUserFromLogin($con, $email, $password){
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = \'".md5($password)."\'";
        return executeSql($con,$sql)->fetch();
    }
    function getSymptomsFromUser($con,$userId){
        $sql = "SELECT * FROM symptom WHERE userId = $userId";
        return executeSql($con,$sql)->fetchAll();
    }
    function getSymptomEventsForMonth($con,$symptomId,$month,$year){
        $endMonth = ($month == 12 ? 1 : $month+1);
        $endYear = ($month == 12 ? $year+1 : $year);
        $sql = "SELECT * FROM symptomEvent WHERE symptomId = $symptomId AND date >= '$year-$month-1 00:00:00' AND date < '$endYear-$endMonth-1 00:00:00'";
        return executeSql($con,$sql)->fetchAll();
    }

    //INSERT
    function insertUser($con,$userName,$email,$password){
        $sql = "INSERT INTO user(userName,email,password) VALUES(\'$userName\',\'$email\',\'".md5($password)."\'";
        $con->exec($sql);
    }
    function insertSymptom($con,$userId,$name,$colour){
        $sql = "INSERT INTO symptom(userId,name,colour) VALUES(\'$userId\',\'$name\',\'$colour\'";
        $con->exec($sql);
    }
    function insertSymptomEvent($con,$symptomId,$date){
        $sql = "INSERT INTO symptomEvent(symptomId,date) VALUES(\'$symptomId\',\'$date\')";
        $con->exec($sql);
    }

    function executeSql($con, $sql){
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }
    
?>