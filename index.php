<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header("Location:" . "./MediTrac/views/login/login.php");
}
?>
<!DOCTYPE html>
<html>
<?php include './MediTrac/views/shared/head.php'; ?>
<script>
    function convertDate(d) {
        var parts = d.split(" ");
        var months = {
            Jan: "01",
            Feb: "02",
            Mar: "03",
            Apr: "04",
            May: "05",
            Jun: "06",
            Jul: "07",
            Aug: "08",
            Sep: "09",
            Oct: "10",
            Nov: "11",
            Dec: "12"
        };
        return parts[3] + "-" + months[parts[1]] + "-" + parts[2];
    }
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
            droppable: true,
            eventReceive: function(info) {
                $.ajax({
                    url: "MediTrac/views/admin_tools/addSymptomEvent.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        title: info.event.title,
                        start: convertDate(info.event.start + ''),
                        end: info.event.end,
                    },
                    success: function(response) {
                        console.log(response)
                    },
                    fail: function() {

                    }
                });
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                <?php
                include './MediTrac/views/admin_tools/db_queries.php';

                $user = $_SESSION['user'];
                $con = connect();
                $symptoms = getSymptomsFromUser($con, $user);
                $year = date("Y");
                $month = date("m");
                $output = "";
                foreach ($symptoms as $symptom) {
                    $events = getSymptomEventsForMonth($con, $symptom['id'], $month, $year);
                    foreach ($events as $event) {
                        $output .= "{title: '" . $symptom['name'] . "',
                            start: '" . $event['date'] . "',
                            color: '" . $symptom['colour'] .
                            "'},";
                    }
                }
                $con = null;
                echo substr($output, 0, -1);
                ?>
            ]
        });

        calendar.render();
    });
</script>

<body>
    <?php include './MediTrac/views/shared/header.html'; ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4 container p-2 border bg-dark text-light">
                    <form id="addSymptom">
                    <div class="d-inline" style="width:300px; display:table">
                            <input id="inputSymptom" type="text" placeholder="Add new" class="d-inline" style="display:table-cell; width:80%">
                            <button type="submit" form="addSymptom" value="Submit" class="d-inline btn btn-light" style="display:table-cell; width:18%">add</button>
                        </div>
                    </form>
                    <div id='external-events'>
                        <h4 class="text-center" style="color: #08d6b0">Symptoms</h4>
                        <div id='draggable-el' class='t-2 m-2'>
                            <?php
                            $user = $_SESSION['user'];
                            $con = connect();
                            $symptoms = getSymptomsFromUser($con, $user);
                            foreach ($symptoms as $symptom) {
                                echo "<div class=\"fc-event fc-draggable p-1 m-1\" style=\"background-color: " . $symptom['colour'] . "; border: solid 1px black\">" . $symptom['name'] . "</div>";
                            }
                            $con = null;
                            ?>
                        </div>
                    </div>
                    <!-- <div id='draggable-el' data-event='{ "title": "my event", "duration": "02:00" }'>drag me!! Test!</div> -->
                </div>
                <div class="col-8">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </main>
    <?php include './MediTrac/views/shared/footer.html'; ?>
</body>

</html>

<script>
    $(document).ready(() => {
        $("#symptomList").change(function() {
            var selectedsymptom = $(this).children("option:selected").val();
            if (selectedsymptom === "Add New Symptom") {
                $(this).parent().append('<div class="form-group row" id="newSymptomDiv"><label for="newsymptom" class="col-sm-2 col-form-label form-control-label">symptom</label>' +
                    '<div class="col-sm-10"><input type="text" class="form-control" id="newsymptom" name="newsymptom"></div></div>');
            }
        });

        $(":submit").click((e) => {
            e.preventDefault();
            $.ajax({
                url: "MediTrac/views/admin_tools/addSymptom.php",
                type: "POST",
                dataType: "json",
                data: {
                    name: $("#inputSymptom").val()
                },
                success: function(response) {
                    console.log(response)
                },
                fail: function() {

                }
            });

            $("#draggable-el").children().append('<div class=\"fc-event fc-draggable p-1 m-1\" style=\"background-color: black "; border: solid 1px black\">TEST</div>');

        })

    });
</script>