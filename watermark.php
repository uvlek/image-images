<?php
$path = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];

if (preg_match('/\.gif/', $path)) {
    $jpg = str_replace('.gif', '.jpg', $path);
    if (!file_exists($jpg) && preg_match('/\.gif/', $path)) {
        $image = imagecreatefromgif($path);
        imagejpeg($image, $jpg);
    }
    $path = $jpg;
}

$image = imagecreatefromstring(file_get_contents($path));
$w = imagesx($image);
$h = imagesy($image);
$watermark = imagecreatefrompng('isometric-grid.png');
$ww = imagesx($watermark);
$wh = imagesy($watermark);
imagecopy($image, $watermark, (1/2)*($w-$ww), (1/2)*($h-$wh), 0, 0, $ww, $wh);
header('Content-type: image/jpeg');
imagejpeg($image,null,95);
exit();
?>