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
        <script src="./script.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="wrap">
            <div class="formWraper">
                <form class="form" name="waterMark" method="POST" action="<?php $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data">

                    <div>
                        <label for="imageUploads">Выбрать изображение (PNG, JPG, GIF)</label>
                        <input type="file" class="imgFile" id="imageUploads" name="imgFile" accept=".jpg, .jpeg, .png, .gif" required>
                    </div>
                    <div class="preview">
                        <p>Файл не выбран</p>
                    </div>

                    <div class="btnWrap">
                        <input class="submitBtn" type="submit" name="submit_btn" value="Загрузить">
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
