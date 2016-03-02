<?php

session_start(); 

$captchastr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';

$captchastr = substr(str_shuffle($captchastr), 0, 6);

$_SESSION["captcha_code"] = $captchastr; 

$im = imagecreatefrompng('captcha_background.png');

$color = imagecolorallocate($im, 0, 0, 140);

$font = 'Oswald.ttf';

$rotate = rand(-10, 10);

imagettftext($im, 18, $rotate, 38, 32, $color, $font, $captchastr);

header('Content-Type: image/png');

imagepng($im);