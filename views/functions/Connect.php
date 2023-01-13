<?php
trait Connect{
    private $user="root";
    private $pass = "";
    private $db = "mysql:dbname=infoApp;host=localhost;charset=utf8";

    function connectDb(){
        try{
            $pdo = new PDO($this->db, $this->user, $this->pass);
            return $pdo;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}