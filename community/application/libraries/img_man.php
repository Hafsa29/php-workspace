<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Img_man{
	private $image;
	private $name;
	private $width;
	private $height;
	function __construct($param){
		$this->image = imagecreatefromjpeg($param['image']);
		$this->name = $param['name'];
		list($width, $height) = getimagesize($param['image']);
		$this->width = $width;
		$this->height = $height;
	}
	function resize_image_large(){
		$ratio = ($this->width / $this->height);
		if($ratio > (2)){
			$new_height = $this->height;
			$new_width = (int)($this->height * 2);
		} else{
			$new_width = $this->width;
			$new_height = (int)($this->width * .5);
		}
		$x = (int)(($this->width - $new_width) / 2);
		$y = (int)(($this->height - $new_height) / 2);
		$temp = imagecreatetruecolor(1000, 500);
		imagecopyresampled($temp, $this->image, 0, 0, $x , $y , 1000, 500, $new_width, $new_height);
		imagejpeg($temp, "./assets/images/products/large/{$this->name}.jpg");
		imagedestroy($temp);
	}
	function resize_image_small(){
		$ratio = ($this->width / $this->height);
		if($ratio > (2)){
			$new_height = $this->height;
			$new_width = (int)($this->height * 2);
		} else{
			$new_width = $this->width;
			$new_height = (int)($this->width * 2);
		}
		$x = (int)(($this->width - $new_width) / 2);
		$y = (int)(($this->height - $new_height) / 2);
		$temp = imagecreatetruecolor (300, 150);
		imagecopyresampled($temp, $this->image, 0, 0, $x , $y , 300, 150, $new_width, $new_height);
		imagejpeg($temp, "./assets/images/products/small/{$this->name}.jpg");
		imagedestroy($temp);
	}
	function clear_image(){
		imagedestroy($this->image);
	}
}