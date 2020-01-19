<?php 
    require './db_queries.php';
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    if(issset($_SESSION['user'])) {
        $symptoms = getSymptomsFromUser($connection, $_SESSION['user']);
        foreach($symptoms as $symptom) {
            if($symptom['name'] === $title) {
                echo insertSymptomEvent($connection, $symptom['id'], $start);
            break;
            }
        }
    }
    