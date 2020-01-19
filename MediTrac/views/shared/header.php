<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="www.meditrac.tech" style="color: #08d6b0">MediTrac</a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link nav navbar-right" href="/MediTrac/views/login/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/MediTrac/views/register/register.php">Register</a>
                </li>
            </ul>
            <?php
                if(isset($_SESSION) && isset($_SESSION['username'])){
                    echo "<p class=\"float-right text-light\">Welcome ".$_SESSION['username']."!</p>";
                }
            ?>
            <form class="form-inline my-2 my-lg-0">
            </form>
        </div>
    </nav>
</header>