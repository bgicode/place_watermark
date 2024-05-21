<?php
include_once('formHandler.php');
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="wrap">
            <div class="formWraper">
                <form class="form" name="waterMark" method="POST" action="<?php $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data">
                    <label class="">
                        <input name="imgFile" type="file" required></input>
                        <!-- <span>Выберите файл</span> -->
                    </label>
                    <div class="btnWrap">
                        <input class="submitBtn" type="submit" name="submit_btn" value="Загрузить">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
