<?php
$con = mysqli_connect("localhost","root","","topia");
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
    }
    class Database {
        private static $instance = NULL;
        private function construct() {}
        private function clone() {}

        public static function getConnexion() {
           if (!isset(self::$instance)) {
              $servername="localhost";
              $username="root";
              $password="";
              $dbname="topia";
              self::$instance = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
           }
           return self::$instance;
        }
     }







?>