<?php
require_once "./functions/Infomation.php";
require_once "./functions/User.php";

    $id=$_GET['id'];
    $infomation = new Infomation;
    $show = $infomation->show($id);

    $user = new User;
    $users = $user->users();
?>


<!DOCTYPE html>
<html lang="ja">
    <?php include('./commons/head.php') ?>
    <body>
        <?php include('./commons/header.php') ?>

        <main>
            <section id="info">
                <?php echo $show['name']?>
                <?php echo $show['content'] ?>

            </section>

            <section id="member">
                <?php   foreach($users as $user){ ?>
                    <p><?php echo $user['name'] ?></p>
                <?php  } ?>
            </section>

            <section>

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