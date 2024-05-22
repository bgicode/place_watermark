<?php
session_start();

include_once('functions.php');

if ($_POST['submit_btn']) {

    if (isset($_FILES['imgFile'])) {

        $fileName = pathinfo($_FILES['imgFile']['name'], PATHINFO_FILENAME );

        $dounloadImgString = file_get_contents($_FILES['imgFile']['tmp_name']);

        $wMarkOriginal = imagecreatefromjpeg('waterMark.jpg');

        $img = imagecreatefromstring($dounloadImgString);

        $widthImg = (int)imagesx($img);
        $heightImg = (int)imagesy($img);

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
        imagecopymerge($imgWhiteBg, $wMark, $widthImg - (int)imagesx($wMark), $heightImg - (int)imagesy($wMark), 0 ,0, (int)imagesx($wMark), (int)imagesy($wMark), (int)$transparency);

        $timestap = time();
        $imgUrljpg = "uploads/$fileName" . "_" . $timestap . ".jpg";
        imagejpeg($imgWhiteBg, $imgUrljpg);
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
        imagedestroy($imgNewSize);
        imagedestroy($img);
        imagedestroy($imgWhiteBg);
        imagedestroy($wMarkOriginal);
        imagedestroy($wMark);
        redirect('result.php');
        exit;
    }
}
