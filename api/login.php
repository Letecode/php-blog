<?php 
    session_start();

    require_once('database.php');

    $method = $_SERVER['REQUEST_METHOD'];

    if($method == "POST"){
        if(isset($_POST['email']) and isset($_POST['password'])) {

            $db = new Database();
            $user = $db->getUserByEmailAndPassword($_POST['email'], $_POST['password']);

            if($user) {
                $_SESSION['connected'] = true;
                $_SESSION['user'] = $user;

                header('Location: ../dashboard.php');
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