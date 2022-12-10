<?php 
    session_start();

    if(!isset($_SESSION['connected']) and !$_SESSION['connected'] == true) {
        header('Location: index.php');
    }

    $userId =  $_SESSION['user']['id'];
   
    include_once 'api/database.php';

    $db = new Database();
    $posts = $db->getPosts();
    $user = $db->getUser($userId);

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

        <header class="masthead" style="">
            <div class="container position-relative  px-lg-5">
                <div class="row gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Dashboard</h1>
                            <span class="subheading">Bienvenu <?php echo $user['name']; ?></span>
                            <form action="api/logout.php" method="post">
                                <input type="submit" class="btn btn-danger" value="Deconnexion">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Mes publications</h1>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd"><i class="bi bi-plus"></i> Ajouter</button>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Summary</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        foreach($posts as $post) {
                    ?>
                        <tr>
                            <td><?php echo $post['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $post['created_at']; ?></td>
                            <td><img src="<?php echo $post['cover']; ?>" alt="image" width="100px"></td>
                            <td><?php echo $post['title']; ?></td>
                            <td><?php echo $post['summary']; ?></td>
                            <td><?php echo substr($post['content'], 0, 100); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $post['id']; ?>" class="btn btn-warning">Modifier</a>
                                <form action="api/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
              




             <!-- modal add apprenant -->
        <div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une publication</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="api/create.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                            <div class="mb-3">
                                <label for="title" class="col-form-label">Titre</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="mb-3">
                                <label for="summary" class="col-form-label">summary</label>
                                <input type="text" class="form-control" name="summary" id="summary"/>
                            </div>

                            <div class="mb-3">
                                <label for="cover" class="col-form-label">Image</label>
                                <input type="file" class="form-control" name="cover" accept=".png,.jpeg">
                            </div>
                            <div class="form-check">
                                <label class="col-form-label" for="contenu">Contenu</label>
                                <textarea name="content" class="form-control" id="contenu" cols="30" rows="10"></textarea>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Créer un apprenant</button>
                            </div>
                        </form>
                    </div>
                </div>
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
