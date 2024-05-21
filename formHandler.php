<?php
// declare(strict_types = 1);

session_start();

include_once('functions.php');

if ($_POST['submit_btn']) {

    if (isset($_FILES['imgFile'])) {

        $fileName = pathinfo($_FILES['imgFile']['name'], PATHINFO_FILENAME );

        $dounloadImgString = file_get_contents($_FILES['imgFile']['tmp_name']);

        $wMarkOriginal = imagecreatefromjpeg('waterMark.jpg');


        $img = imagecreatefromstring($dounloadImgString);

        $widthImg = imagesx($img);
        $heightImg = imagesy($img);

        $imgWhiteBg = imagecreatetruecolor($widthImg, $heightImg);
        $white = imagecolorallocate($imgWhiteBg, 255, 255, 255); 
        imagefill($imgWhiteBg, 0, 0, $white);
        imagecopy($imgWhiteBg, $img, 0, 0, 0, 0, $widthImg, $heightImg);

        if ($widthImg >= $heightImg) {
            $wMark = resizeImgProp($wMarkOriginal, $heightImg * 0.3);
        } elseif ($widthImg <= $heightImg) {
            $wMark = resizeImgProp($wMarkOriginal, $widthImg * 0.3);
        }

        imagesavealpha($imgWhiteBg, true);
        $transparencyp = 60;
        $transparency = 127 - $transparencyp * 127 / 100;
        imagecopymerge($imgWhiteBg, $wMark, $widthImg - imagesx($wMark), $heightImg - imagesy($wMark), 0 ,0, imagesx($wMark), imagesy($wMark), $transparency);

        $timestap = time();

        $imgUrljpg = "uploads/$fileName" . "_" . $timestap . ".jpg";

        imagejpeg($imgWhiteBg, $imgUrljpg);
        imagedestroy($imgWhiteBg);
        $_SESSION['img']['ulrJpg'] = $imgUrljpg;

        if (getimagesizefromstring($dounloadImgString)['mime'] != 'image/gif') {

            $imgNewSize = resizeImgProp($imgWhiteBg, 300);

            $imgUrlWebp = "uploads/$fileName" . "_" . $timestap . ".webp";
            imagewebp($imgNewSize, $imgUrlWebp);
            imagedestroy($imgNewSize);
            $_SESSION['img']['notGif'] = true;
            $_SESSION['img']['ulrWebp'] = $imgUrlWebp;
        } else {
            $_SESSION['img']['notGif'] = false;
        }

        redirect('result.php');
        exit;
    }
}
