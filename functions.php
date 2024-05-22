<?php

function redirect($extra)
{
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    
    header("Location: http://$host$uri/$extra");
}

function resizeImgProp($gdImage, $newMaxSize)
{
    $oldWidth = imagesx($gdImage);
    $oldHeight = imagesy($gdImage);
    
    if ($oldWidth > $oldHeight) {
        $newWidth = $newMaxSize;
        $newHeight = $oldHeight * ($newWidth / $oldWidth);
    } elseif ($oldHeight > $oldWidth) {
        $newHeight = $newMaxSize;
        $newWidth = $oldWidth * ($newHeight / $oldHeight);
    } else {
        $newHeight = $newMaxSize;
        $newWidth = $newMaxSize;
    }

    $newImg = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($newImg, $gdImage, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($gdImage), imagesy($gdImage));
    return $newImg;
}
