<!DOCTYPE html>
<html>
<?php include './MediTrac/views/shared/head.html'; ?>

<body>
    <?php include './MediTrac/views/shared/header.html'; ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <input type="text" placeholder="Search..">
                    <div id='external-events'>
                        <h4>Draggable Events</h4>
                        <div id='draggable-el'>
                            <div class="event">My Event 1</div>
                            <div class='event'>My Event 2</div>
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