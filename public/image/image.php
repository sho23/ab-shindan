<?php
// GETで文字列取得
$txt = mb_convert_encoding($_GET["pt"],"UTF-8","auto");

// 元画像
$im = imagecreatefrompng('https://placehold.jp/3d4070/ffffff/600x300.png?text=%20');

// 白色の背景と青色のテキスト
$bg = imagecolorallocate($im, 0, 0, 255);
$textcolor = imagecolorallocate($im, 255, 255, 255);

//フォントを取得
$font = "../ipaexg.ttf";
$fontSize = 30;

// 文字の中央揃え
$tb = imagettfbbox($fontSize, 0, $font, $txt);
$x = ceil((600 - $tb[2]) / 2);

// 文字列を描画
imagettftext($im, $fontSize, 0, $x, 135, $textcolor, $font, $txt);

// 以下画像を出力
header("Content-type: image/png");

imagepng($im);
imagedestroy($im);

?>