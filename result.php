<?php
session_start();

include_once('functions.php');

if ($_POST['submit_btn']) {
    
    $_SESSION = [];

    unset($_COOKIE[session_name()]);

    session_destroy();

    redirect('index.php');

    exit;
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="resultWrap">
            <img src="<?= $_SESSION['img']['ulrJpg'] ?>" alt="">
            <div>
                <a href="<?= $_SESSION['img']['ulrJpg'] ?>"><?= basename($_SESSION['img']['ulrJpg']) ?></a>
            </div>
            <div>
                <?php
                    if ($_SESSION['img']['notGif']) {
                        echo '<a href="' . $_SESSION['img']['ulrWebp'] . '">' . basename($_SESSION['img']['ulrWebp']) . '</a>';
                    } else {
                        echo '<span class="notWebp">Для данного расширения перевод в формат WEBP невозможен</span>';
                    }
                ?>
            </div>
            <form class="form" name="waterMarkResult" method="POST" action="<?php $_SERVER['REQUEST_URI'] ?>">
                <div class="btnWrap">
                    <input class="submitBtn" type="submit" name="submit_btn" value="Загрузить ещё">
                </div>
            </form>
        </div>
    </body>
</html>
