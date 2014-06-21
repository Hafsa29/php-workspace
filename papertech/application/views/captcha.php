<?php
	session_start();  
  
	$string = '';  
  
	for ($i = 0; $i < 5; $i++) {  
	    $string .= chr(rand(97, 122));  
	}  
  
	$_SESSION['random_code'] = $string;

	$dir = realpath('assets/fonts/asman.ttf');

	$image = imagecreatetruecolor(100, 30);  
	$color = imagecolorallocate($image, 200, 100, 90);
	$white = imagecolorallocate($image, 255, 255, 255);

	imagefilledrectangle($image, 0, 0, 200, 100, $white);  
	imagettftext($image, 30, 0, 0, 25, $color, $dir, $_SESSION['random_code']);

	header("Content-type: image/png");  
	imagepng($image);
?>