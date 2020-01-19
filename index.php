<?php
if(!isset($_SESSION['user'])){
                    header("Location:"."./MediTrac/views/login/login.php");
                }
                ?>
<!DOCTYPE html>
<html>
<?php include './MediTrac/views/shared/head.php'; ?>
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

<body>
    <?php include './MediTrac/views/shared/header.html'; ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4 container p-2 border bg-dark text-light">
                    <input type="text" placeholder="Add new" class="w-100 p-1 m-1">
                    <div id='external-events'>
                        <h4 class="text-center" style="color: #08d6b0">Draggable Events</h4>
                        <div id='draggable-el' class='t-2 m-2'>
                            <div class="fc-event fc-draggable p-1 m-1" style="background-color: #08d6b0; border: solid 1px #08d6b0">My Event 1</div>
                            <div class='fc-event fc-draggable p-1 m-1' style="background-color: #08d6b0; border: solid 1px #08d6b0">My Event 2</div>
                        </div>

                    </div>

                    <!-- <div id='draggable-el' data-event='{ "title": "my event", "duration": "02:00" }'>drag me!! Test!</div> -->
                </div>
                <div class="col-8">
                    <div id='calendar'></div>
                </div>
                <!-- modal  -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label for="role">Symptom</label>
                                        <select class="form-control" id="symptomList" name="symptomList">
                                            <option id="firstOption">Headache</option>
                                            <option>Fever</option>
                                            <option id="addNewsymptom">Add New Symptom</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="btnSave">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of modal  -->
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


    });
</script>