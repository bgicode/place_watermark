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
            <img src="<?= $_SESSION['ulrJpg'] ?>" alt="">
            <div>
                <a href="<?= $_SESSION['ulrJpg'] ?>"><?= basename($_SESSION['ulrJpg']) ?></a>
            </div>
            <div>
                <?php
                    if ($_SESSION['notGif']) {
                        echo '<a href="' . $_SESSION['ulrWebp'] . '">' . basename($_SESSION['ulrWebp']) . '</a>';
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