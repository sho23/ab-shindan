<?php
// 100*30 の画像を生成します
$im = imagecreate(600, 300);
$im = imagecreatefrompng('https://placehold.jp/3d4070/ffffff/600x300.png');
// 白色の背景と青色のテキスト
$bg = imagecolorallocate($im, 0, 0, 255);
$textcolor = imagecolorallocate($im, 255, 255, 255);

// 左上に文字列を描画します
imagestring($im, 300, 30, 135, "Hello world!", $textcolor);

// 画像を出力します
header("Content-type: image/png");

imagepng($im);
imagedestroy($im);
?>