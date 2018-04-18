<?php
// GETで文字列取得
$txt = mb_convert_encoding($_GET["pt"],"UTF-8","auto");

$txt_arr = [];
if (10 < mb_strlen($_GET["pt"])) {
	$txt_arr[0] = mb_substr($_GET["pt"], 0, 10, "UTF-8");
	$txt_arr[1] = mb_substr($_GET["pt"], 10, 10, "UTF-8");
}

// 元画像
$im = imagecreatefrompng('https://placehold.jp/3d4070/ffffff/420x300.png?text=%20');

// 白色の背景と青色のテキスト
$bg = imagecolorallocate($im, 0, 0, 255);
$textcolor = imagecolorallocate($im, 255, 255, 255);

//フォントを取得
$font = "../mplus-1p-medium.ttf";
$fontSize = 30;

// 文字の中央揃え
if (!empty($txt_arr)) {
	$tb1 = imagettfbbox($fontSize, 0, $font, $txt_arr[0]);
	$x1 = ceil((420 - $tb1[2]) / 2);
	$tb2 = imagettfbbox($fontSize, 0, $font, $txt_arr[1]);
	$x2 = ceil((420 - $tb2[2]) / 2);
} else {
	$tb = imagettfbbox($fontSize, 0, $font, $txt);
	$x = ceil((420 - $tb[2]) / 2);
}

// 文字列を描画
if (!empty($txt_arr)) {
	imagettftext($im, $fontSize, 0, $x1, 130, $textcolor, $font, $txt_arr[0]);
	imagettftext($im, $fontSize, 0, $x2, 180, $textcolor, $font, $txt_arr[1]);
} else {
	imagettftext($im, $fontSize, 0, $x, 160, $textcolor, $font, $txt);
}

// 以下画像を出力
header("Content-type: image/png");

imagepng($im);
imagedestroy($im);

?>