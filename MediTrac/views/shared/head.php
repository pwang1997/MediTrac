<?php
if(!isset($_SESSION['user'])){
                    header("Location:"."var/www/html/MediTrac/views/login/login.php");
                }
                ?>

<head>
    <!--Bootstrap-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!--Site wide CSS-->
    <link rel="stylesheet" href="./MediTrac/static/styles/site.css">

    <!--Full Calendar-->
    <meta charset='utf-8' />

    <link href='./MediTrac/static/libraries/fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='./MediTrac/static/libraries/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='./MediTrac/static/libraries/fullcalendar/packages/interaction/main.css' rel='stylesheet' />

    <script src='./MediTrac/static/libraries/fullcalendar/packages/core/main.js'></script>
    <script src='./MediTrac/static/libraries/fullcalendar/packages/daygrid/main.js'></script>
    <script src='./MediTrac/static/libraries/fullcalendar/packages/interaction/main.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendarInteraction.Draggable

            var draggableEl = document.getElementById('draggable-el');
            var calendarEl = document.getElementById('calendar');

            new Draggable(draggableEl, {
                itemSelector: '.fc-event',
                eventData: function(eventEl) {
                    return {
                        title: eventEl.innerText.trim()
                    }
                }
            });

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'interaction', 'timeGrid'],
                header: {
                    left: 'today',
                    center: 'title',
                    right: 'prev,next'
                },
                navLinks: true, // can click day/week names to navigate views
                //selectable: true,
                selectMirror: true,
                // select: function(arg) {
                //     var modal = $('.modal');
                //     modal.modal('show');
                //     symptom = "";
                //     isAdded = false;

                //     //ISSUE: not updating event calendar
                //     $("#btnSave").click((e) => {
                //         symptom = $("#symptomList").select().val()
                //         if (symptom === "Add New Symptom" && $('#newsymptom').val()) {
                //             symptom = $('#newsymptom').val();
                //         }
                //         console.log(symptom)
                //         if (symptom) {
                //             calendar.addEvent({
                //                 title: symptom,
                //                 start: arg.start,
                //                 end: arg.end,
                //                 allDay: arg.allDay
                //             });
                //         }
                //         calendar.unselect();
                //         modal.modal('hide');
                //         $('#newSymptomDiv').remove();
                //         $("#firstOption").attr('selected', '');
                //     });

                // var title = prompt('Event Title:');
                // if (title) {
                //     calendar.addEvent({
                //         title: title,
                //         start: arg.start,
                //         end: arg.end,
                //         allDay: arg.allDay
                //     })
                // }
                // },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                <?php
                include './MediTrac/views/admin_tools/db_queries.php';
                
                $user = $_SESSION['user'];
                $con = connect();
                $symptoms = getSymptomsFromUser($con,$user);
                $year = date("Y");
                $month = date("m");
                $output = "";
                foreach($symptoms as $symptom){
                    $events = getSymptomEventsForMonth($con,$symptom['id'],$month,$year);
                    foreach($events as $event){
                        $output .= "{title: '".$symptom['name']."',
                            start: '".$event['date']."',
                            color: '".$symptom['colour'].
                            "'},";
                    }
                }
                $con = null;
                echo substr($output,0,-1);
                ?>
                ]
            });

            calendar.render();
        });
    </script>

</head>