<?php 

    require_once('database.php');

    $method = $_SERVER['REQUEST_METHOD'];

    if($method == "POST"){
        if(isset($_FILES['cover']) and isset($_POST['user_id']) and isset($_POST['title']) and isset($_POST['summary']) and isset($_POST['content'])) {


            $target_dir = "../uploads/";
            $target_file = 'uploads/' . basename($_FILES["cover"]["name"]);
            $target_upload = $target_dir . basename($_FILES["cover"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["cover"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                // die("Sorry, your file was not uploaded.");
                header('Location: ../dashboard.php');
              // if everything is ok, try to upload file
              } else {
                if (!move_uploaded_file($_FILES["cover"]["tmp_name"], $target_upload)) {
                  echo "Sorry, there was an error uploading your file.";
                } else {
                    $coverImage = $target_file;
                    $db = new Database();
                    $result = $db->createPost($_POST['user_id'], $_POST['title'], $_POST['summary'], $_POST['content'], $coverImage, 1);
                
                    if($result) {
                        $_SESSION['newpost'] = true;

                        header('Location: ../dashboard.php');
                    } else {
                        $_SESSION['error'] = "Erreur";
                        header('Location: ../dashboard.php');
                    }
                }
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