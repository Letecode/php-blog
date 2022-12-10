<?php 
    session_start();
    if(isset($_SESSION['connected']) and $_SESSION['connected'] == true) {
        header('Location: dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Clean Blog - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    
    <body>
        <!-- Navigation-->
        <?php include('includes/navigation.php'); ?>

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h1>Se connecter</h1>
                    <form action="api/login.php" method="POST">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="staticEmail" name="email" value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label" >Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="inputPassword">
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-primary" type="submit">Se connecter</button>
                        </div>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="register.php">Create Account</a></li>

                    </form>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <?php include('includes/footer.php'); ?>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>