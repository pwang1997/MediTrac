<?php 
    require './db_queries.php';
    $title = $_POST['title'];
    echo $start = date("YYYY-MM-DD", strtotime($_POST['start']));
    $end = $_POST['end'];

    if(!isset($_SESSION)) { session_start();}
    echo $_SESSION['user'];
    print_r(getSymptomsFromUser(connect(), $_SESSION['user']));
    if(isset($_SESSION['user'])) {
        $symptoms = getSymptomsFromUser(connect(), $_SESSION['user']);
        foreach($symptoms as $symptom) {
            if($symptom['name'] === $title) {
                echo insertSymptomEvent(connect(), $symptom['id'], $start);
            break;
            }
        }
    }

