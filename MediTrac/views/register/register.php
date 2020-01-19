<!DOCTYPE html>
<html>
    <?php include '../shared/head.php'; ?>
    <!--<script src="../../static/scripts/register.js"></script>-->
    
    <body>
        <?php include '../shared/header.php'; ?>
    <main>
        <div class="mx-auto" style="width: 600px;">
            <form id="registerForm" method="POST"action="../admin_tools/registerProcess.php">
                <div class="row">
                    <h4 class="offset-md-6">Register</h4>
                </div>

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label form-control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label form-control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label form-control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label form-control-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password2" name="password2" required>
                    </div>
                </div>
                <div class="row">
                    <button type="reset" class="btn btn-black col-md-4">Reset</button>
                    <button type="submit" class="btn btn-black col-md-4 offset-md-4" id="submit">Submit</button>
                </div>
        </div>
        </form>
    </main>
    <?php include '../shared/footer.html'; ?>
</body>
</html>