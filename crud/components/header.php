<header class="py-4 text-white fs-3 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center text-md-start mb-3 mb-md-0">
                <a href="index.php">My Library</a>
            </div>
            <?php
                if ( !isset($_SESSION['adm']) && !isset($_SESSION['user']) ) {
            ?>
            <div class="col-12 col-md-6 text-center text-md-end">
                <a href= "login.php"><button class='btn my_text'type="button">Sign in</button></a>
            </div>

            <?php }
            ?>

             <?php
                if ( isset($_SESSION['adm']) OR isset($_SESSION['user']) ) {
            ?>
            <div class="col-12 col-md-6 text-center text-md-end">
                <a href= "home.php"><button class='btn my_text'type="button">My profile</button></a>
                <a href= "logout.php?logout"><button class='btn my_text'type="button">Log out</button></a>
            </div>

            <?php }
            ?>
            <!--- only for admin
            <div class="col-12 col-md-3 text-end">
                <a href= "create.php"><button class='btn btn-secondary'type="button" >Add media</button></a>
            </div>
            -->
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light my_bg">
    <div class="container container-fluid">
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
                <li class="nav-item active px-2">
                    <a class="nav-link text-dark" href="index.php">Home</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-dark" href="index2.php">Books</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-dark" href="index3.php">CD</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-dark" href="index4.php">DVD</a>
                </li>
                <li class="nav-item px-2">
                    <a class="nav-link text-dark" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>