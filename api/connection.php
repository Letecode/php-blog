<?php

    class Connection {

        private $db;

        function __construct(){}

        function connect() {
            $this->db = new PDO('mysql:host=localhost;dbname=monblog', 'root', 'root');
            return $this->db;
        }
    }


?>