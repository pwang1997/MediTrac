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
                                        <label for="role">Sympotom</label>
                                        <select class="form-control" id="sympotomList" name="sympotomList">
                                            <option>Headache</option>
                                            <option>Fever</option>
                                            <option id="addNewSympotom">Add New Sympotom</option>
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
        $("#sympotomList").change(function() {
            var selectedSympotom = $(this).children("option:selected").val();
            if (selectedSympotom === "Add New Sympotom") {
                $(this).parent().append('<div class="form-group row"><label for="newSympotom" class="col-sm-2 col-form-label form-control-label">Sympotom</label>' +
            '<div class="col-sm-10"><input type="text" class="form-control" id="newSympotom" name="newSympotom"></div></div>');
            }
        });


    });
</script>