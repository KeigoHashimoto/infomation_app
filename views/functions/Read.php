<?php
class readed{
    use Connect;

    function index(){
        $pdo = $this->connectDb();
        $sql = "SELECT user_id,info_id FROM user_info;";
        $stmt = $pdo->query($sql);
        $user_info = $stmt->fetchAll();
        $stmt = null;
        $pdo=null;

        return $user_info;
    }
    function user_info($userId,$infoId){
        $pdo = $this->connectDb();

        $sql = "INSERT INTO user_info(user_id,info_id) VALUE(:user_id,:info_id);";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $stmt->bindParam(':info_id', $infoId, PDO::PARAM_STR);
        $stmt->execute();
        $stmt = null;
        $pdo = null;

        header('Location:../index.php');
        exit;
    }
}
session_start();

$userId = $_SESSION['user_id'];
$infoId = $_SESSION['info_id'];

$user_info = new readed;
$user_info->user_info($userId, $infoId);

session_destroy();