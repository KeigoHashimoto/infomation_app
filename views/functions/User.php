<?php
class User{
    use Connect;

    function users(){
        $pdo = $this->connectDb();
        $sql = "SELECT * FROM users;";
        $stmt = $pdo->query($sql);
        $records = $stmt->fetchAll();
        $stmt = null;
        $pdo = null;

        return $records;
    }
}