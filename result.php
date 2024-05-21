<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            img {
                margin-top: 20px;
                height: 400px;
                margin-left: auto;
                margin-right: auto;
                display: block;
            }

            .resultWrap *{
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }
        </style>
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
                        echo '<span>Для данного расширения перевод в формат WEBP невозможен</span>';
                    }
                ?>
            </div>
            <div>
                <a href="index.php">Загрузить ещё</a>
            </div>
        </div>
    </body>
</html>