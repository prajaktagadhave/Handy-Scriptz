<?php

function resizeImage(string $file, int $width, int $height, bool $crop = false)
{
    list($originalWidth, $originalHeight) = getimagesize($file);
    $ratio = $originalWidth / $originalHeight;

    $fileType = strtolower(array_reverse(explode('.', $file))[0]);

    $newheight = $width / $ratio;
    $newwidth = $width;

    if ($width / $height > $ratio) {
        $newwidth = $height * $ratio;
        $newheight = $height;
    }

    if ($crop) {
        $originalHeight = ceil($originalHeight - ($originalHeight * abs($ratio - $width / $height)));
        if ($originalWidth > $originalHeight) {
            $originalWidth = ceil($originalWidth - ($originalWidth * abs($ratio - $width / $height)));
        }

        $newwidth = $width;
        $newheight = $height;
    }

    switch ($fileType) {
        case 'jpg':
        case 'jpeg':
            $src = imagecreatefromjpeg($file);
            break;
        case 'png':
            $src = imagecreatefrompng($file);
            break;
        case 'gif':
            $src = imagecreatefromgif($file);
            break;
        default:
            throw new InvalidArgumentException('file ins\'t a supported image');
            break;
    }

    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $originalWidth, $originalHeight);

    return $dst;
}