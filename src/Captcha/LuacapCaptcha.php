<?php

namespace LuacapCaptcha\Captcha;

use Response;

class LuacapCaptcha {

	private $textLength;
	private $textRandom;
	
	private $backgroundCaptcha;

	private $first_color;
	private $second_color;
	private $third_color;

	public function __construct() {

		$this->randomColor();
		$this->textLength = 6;
		$this->textRandom = $this->randomText();

		$publicPath = dirname(dirname(__DIR__)).'/public/';

		$this->backgroundCaptcha = array(
			$publicPath . 'bg-captcha1.jpg',
			$publicPath . 'bg-captcha2.jpg',
			$publicPath . 'bg-captcha3.jpg',
			$publicPath . 'bg-captcha4.jpg',
			$publicPath . 'bg-captcha5.jpg',
			$publicPath . 'bg-captcha6.jpg',
			$publicPath . 'bg-captcha7.jpg',
			$publicPath . 'bg-captcha8.jpg',
			$publicPath . 'bg-captcha9.jpg',
			$publicPath . 'bg-captcha10.jpg',
			$publicPath . 'bg-captcha11.jpg',
			$publicPath . 'bg-captcha12.jpg',
			$publicPath . 'bg-captcha13.jpg',
			$publicPath . 'bg-captcha14.jpg'
		);
	}

	public function setLength($length) {
		$this->textLength = $length;
	}

	public function getLength() {
		return $this->textLength;
	}

	public function randomText() {
		$ranStr = sha1(md5(microtime()));
		return substr($ranStr, 0, $this->textLength);
	}

	public function randomColor() {
		$this->first_color = rand(0,81);
		$this->second_color = rand(45,150);
		$this->third_color = rand(44,255);
	}

	public function createCaptchaImage() {
        $_SESSION['luacap_captcha_code'] = $this->textRandom;
		$index_random_bg = array_rand($this->backgroundCaptcha,1);
		$newImage = imagecreatefromjpeg($this->backgroundCaptcha[$index_random_bg]);
		$txtColor = imagecolorallocate($newImage, $this->first_color, $this->second_color, $this->third_color);
		imagestring($newImage,5, 3, 5, $this->textRandom, $txtColor);
		imagejpeg($newImage);
	}

	public function getCaptchaImage() {
		$image = $this->createCaptchaImage();
		header('Content-Type: image/jpeg');
		echo $image; exit();
	}

	public function getProductInfo() {
		return array(
			'name' => 'Captcha library for laravel framework',
			'version' => '2.0.0'
		);
	}

	public function test() {
		echo 'test';
	}
}
