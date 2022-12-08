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
            $stmt = $this->db->prepare("SELECT * FROM posts");
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
    }




?>