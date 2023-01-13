<?php
require_once './functions/Infomation.php';
require_once './functions/User.php';
session_start();

$token = uniqid('', true);
$_SESSION['token'] = $token;

$info = new Infomation();
$index = $info->index();

?>

<!DOCTYPE html>
<html lang="ja">
    <?php include('./commons/head.php') ?>
    <body>
        <?php include('./commons/header.php')?>
        <main>
            <section id="info-form">
                <?php
                if(isset($_SESSION['error'])) { ?>
                    <p><?php echo $_SESSION['error']?></p>
                <?php
                }
                ?>
                <form action="./functions/InfoStore.php" method="post">
                    <div class="form-group">
                        <label for="name">名前：</label>
                        <select name="name" id="name">
                            <option value="">名前を選択してください</option>
                            <?php
                            $user = new User;
                            $users = $user->users();
                            foreach($users as $user){ ?>
                                <option value = <?php echo $user['name'] ?>><?php echo $user['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div>

                    <div class="form-group">
                        <label for="title">タイトル：</label>
                        <input type="text" name="title" placeholder="タイトルを入力してください。">
                    </div>

                    <input type="hidden" name="token" value=<?php echo $token; ?>>
    
                    <div class="form-group">
                        <label for="content">内容：</label>
                        <textarea name="content" id="" cols="30" rows="10" placeholder="内容を入力してください。"></textarea>
                    </div>

                    <button type="submit" class="submit-btn">submit</button>
                </form>
            </section>

            <section id="info-index">
                <?php foreach ($index as $record) { ?>
                    <div class="index-content">
                        <a href="./show.php?id=<?php echo $record['id'] ?>"> <?php echo $record['title'];?> </a>
                        <p> <?php echo $record['created_at']; ?> </p>
                    </div>
                <?php } ?>
            </section>
        </main>

        <footer>

        </footer>

        <!--javaScript-->
        <!--jQuery-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js"></script>

        <!--waypoint-->
        <script src="js/jquery.waypoints.min.js"></script>

        <!--swiper-->
        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

        <!--magnific-popup-->
        <script src="js/jquery.magnific-popup.min.js"></script>

        <!--font-awesome-->
        <script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>

        <!--main-javaScript-->
        <script src="js/main.js"></script>
    </body>
</html>