<?php 
    if(isset($_SESSION['connected']) and $_SESSION['connected'] == true) {
        $connected = true;
    } else {
        $connected = false;
    }
?>

<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">Letecode Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>

                <?php 
                    if($connected) { ?>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="dashboard.php">Dashboard</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="register.php">Create Account</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="login.php">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>