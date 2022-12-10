<?php 
    session_start();

    require_once('database.php');

    $method = $_SERVER['REQUEST_METHOD'];

    if($method == "POST"){
        if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['password'])) {

            $db = new Database();
            $user = $db->createUser($_POST['name'], $_POST['email'], $_POST['password']);
         

            if($user) {
                $_SESSION['newregister'] = true;

                header('Location: ../login.php');
            } else {
                $_SESSION['error'] = "Mot de passe incorrect";
                header('Location: ../index.php');
            }

        } else {
            $_SESSION['error'] = "Entrez tout les champs";
            echo "ERREUR SERVER 3";
            //header('Location: ../index.php');
        }
    } else {
        $_SESSION['error'] = "Method incorrect";
        header('Location: ../index.php');
    }

    
?>