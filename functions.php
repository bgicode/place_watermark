<?php

function redirect(string $extra): void
{
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    
    header("Location: http://$host$uri/$extra");
}


function getSize($gdImage, $newMaxSize)
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

    $arImgSize[] = $newWidth;
    $arImgSize[] = $newHeight;

    return $arImgSize;
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

function resizeImg($gdImage, $sizeX, $sizeY)
{ 
    $newImg = imagecreatetruecolor($sizeX, $sizeY);
    imagecopyresampled($newImg, $gdImage, 0, 0, 0, 0, $sizeX, $sizeY, imagesx($gdImage), imagesy($gdImage));
    return $newImg;
}

function imgViev(string $file): void
{
    $img = imagecreatefromstring($file);
    $type = getimagesizefromstring($file)['mime'];
    $contentType = "Content-type: " . $type;
    header($contentType);
    switch ($type) {
        case 'image/gif':
            // $im = imageCreateFromGif($img);
            imagegif($img);
            imagedestroy($img);
            break;
        case 'image/png':
            // $im = imageCreateFrompng($img);
            imagepng($img);
            imagedestroy($img);
            break;
        case 'image/jpeg':
            // $im = imageCreateFromjpeg($img);
            imagejpeg($img);
            imagedestroy($img);
            break;
    }
}

// function imgViev(string $file): void
// {
//     $type = getimagesize($file)['mime'];
//     $contentType = "Content-type: " . $type;
//     header($contentType);
//     switch ($type) {
//         case 'image/gif':
//             $im = imageCreateFromGif($file);
//             imagegif($im);
//             break;
//         case 'image/png':
//             $im = imageCreateFrompng($file);
//             imagepng($im);
//             break;
//         case 'image/jpeg':
//             $im = imageCreateFromjpeg($file);
//             imagejpeg($im);
//             break;
//     }
// }