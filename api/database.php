<?php 

    class Database {
        private $db;

        function __construct()
        {
            include_once 'connection.php';
            $link = new Connection();
            $this->db = $link->connect();
        }

        function getPosts() {
            $stmt = $this->db->prepare("SELECT * FROM posts ORDER BY created_at DESC ");
            $stmt->execute();

            return $stmt->fetchAll();
        }

        function getPostsWithPagination($limit, $start) {
            

            $stmt = $this->db->prepare("SELECT * FROM posts ORDER BY created_at DESC limit ".$start . ",".$limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }

        function getPost($id) {
            $stmt = $this->db->prepare("SELECT * FROM posts WHERE id=".$id);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        function getUser($id) {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE id=".$id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        function getUserByEmailAndPassword($email, $password) {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE email='".$email. "' AND password='".$password."'");
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        function createUser($name, $email, $password) {
            $stmt = $this->db->prepare("INSERT INTO users (name, email, password, created_at) VALUES ( :name, :email, :password, Now())");
            $result = $stmt->execute(
                array(
                    ':name' => $name,
                    ':email' => $email,
                    ':password' => $password
                )
            );
          
            return $result;
        }

        function createPost($user, $title, $summary, $content, $cover, $category) {
            $stmt = $this->db->prepare("INSERT INTO posts (title, summary, content, created_at, cover, id_users, id_categories) VALUES ( :title, :summary, :content, Now(), :cover, :id_users, :id_categories)");
            $result = $stmt->execute(
                array(
                    ':title' => $title,
                    ':summary' => $summary,
                    ':content' => $content,
                    ':cover' => $cover,
                    ':id_users' => $user,
                    ':id_categories' => $category,
                )
            );
          
            return $result;
        }
        
    }




?>