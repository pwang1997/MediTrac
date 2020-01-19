<!DOCTYPE html>
<html>
<?php include '../shared/head.html'; ?>

<body>
    <?php include '../shared/header.html'; ?>
    <main>
        <div class="mx-auto" style="width: 600px;">
            <form id="registerForm" >
                <h4 class="mx-auto">Login</h4>

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
        </div>
        </form>
    </main>
    <?php include '../shared/footer.html'; ?>
</body>

</html>