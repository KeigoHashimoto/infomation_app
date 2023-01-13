<?php
require "Connect.php";

class Infomation{
    use Connect;

    function index(){
        $pdo= $this->connectDb();
        $sql = "SELECT * FROM infomation ORDER BY id desc;";
        $stmt = $pdo->query($sql);
        $records = $stmt->fetchAll();
        $stmt = null;
        $pdo = null;
        return $records;
    }

    public function show($id){
        $pdo = $this->connectDb();
        $sql = "SELECT * FROM infomation WHERE id = $id;";
        $stmt = $pdo->query($sql);
        $record = $stmt->fetch();
        $stmt = null;
        $pdo = null;
        return $record;
    }

    function store(){
        session_start();

        if(array_key_exists('name',$_POST)){
            $name = $_POST['name'];
            $content = $_POST['content'];
            $title = $_POST['title'];
    
            // POSTでトークンが送られていたら格納、いなかったら空を格納
            $token = isset($_POST['token']) ? $_POST['token'] : '';
            // SESSIONにトークンがあるかどうか
            $session_token = isset($_SESSION['token']) ? $_SESSION['token']: '';
            //SESSION内のtokenの破棄
            unset($_SESSION['token']);

            if($token != '' && $token == $session_token){
                //validation 
                if(empty($name) && empty($content) ){
                    $_SESSION['error'] = "名前と内容を入力してください";
                }elseif(empty($name) && !empty($content)){
                    $_SESSION['error'] = "名前を入力してください";
                }elseif(!empty($name) && empty($content)){
                    $_SESSION['error'] = "内容を入力してください";
                }else{
                    $pdo = $this->connectDb();
                    $sql = "INSERT INTO infomation(name,content,title) VALUE(:name,:content,:title);";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                    $stmt->bindParam(':content', $content, PDO::PARAM_STR);
                    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
                    $stmt->execute();
                    $stmt = null;
                    $pdo = null;            
                }
            }
        }

        header('Location:../index.php');
        exit;
    }
}