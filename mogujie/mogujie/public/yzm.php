<?php
//开启session
	session_start();
//准备
	$len = 4;			//显示验证码的字符个数
	$h 	 = 40;			//画布高
	$w 	 = 20 * $len;	//画布宽

//准备画布
	$im = imagecreatetruecolor($w, $h);

//分配颜色
	$b = imagecolorallocate($im, 255, 255, 255);
	$bg = imagecolorallocate($im, 100, 100, 100);

	imagefill($im, 0,0, $bg);

//1.写字
	$str = '345678wertyupasdfghjkxcvbnmQWERTYUPASDFGHJKLXCVBNM';
	$yzm = '';
	for ($i = 0; $i < $len; $i++) {
		$xb = mt_rand(0, strlen($str)-1);
		$yzm .= $str[$xb];
		imagefttext($im, 20, mt_rand(-25, 25), 18*$i+5, 30, $b, 'c:/windows/fonts/msyhbd.ttf', $str[$xb]);
	}

	//将拼接好的字符放入session中
	$_SESSION['yzm'] = $yzm;

//2.随机画点
	for ($i = 0; $i < 100; $i++) {
		$ys = imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
		imagesetpixel($im, mt_rand(0, $w), mt_rand(0, $h), $ys);
	}

//3.随机画干扰线
	for ($i = 0; $i < 10; $i++) {
		$ys = imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
		imageline($im, mt_rand(0, $w), mt_rand(0, $h), mt_rand(0, $w), mt_rand(0, $h), $ys);
	}

//输出图像
	header("content-type:image/png");
	imagepng($im);

//销毁资源
	imagedestroy($im);