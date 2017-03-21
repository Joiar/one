<?php
/**
 * 单文件上传函数
 * @param string $pic 表中type='file'的name值
 * @param string $path 文件上传成功后存放的路径
 * @param int $size 文件上传的最大允许大小，单位为字节；默认为0，不限制
 * @param array $types 允许上传文件的类型，默认为图片
 * @return array $info 	包含上传结果信息的数组
 */
function upload($pic, $path='upload', $size=0, $types=['image/jpeg', 'image/png', 'image/gif'])
{
	//提前准备一个数组，用于最后返回
	$info['status'] = false;

	//超出post允许上传的大小，$_POST和$_FILES都为空
	if (empty($_FILES) && empty($_POST)) {
		$info['msg'] = '文件太大了，超出了POST能提交的范围';//message
		return $info;
	}

	$file = $_FILES[$pic];
// 1.判断错误号
	switch ($file['error']) {
		case 1:
			$info['msg'] = '亲，太大了，受不了';
			break;
		case 2:
			$info['msg'] = '亲，还是太大了，受不了';
			break;
		case 3:
			$info['msg'] = '亲，只有部分文件被上传';
			break;
		case 4:
			$info['msg'] = '亲，你傻了吧，没有文件被上传';
			break;
		case 6:
			$info['msg'] = '亲，出问题了，找不到临时文件夹';
			break;
		case 7:
			$info['msg'] = '亲，进不来了，姿势不对';
			break;
	}
	if ($file['error'] !== 0) return $info;

// 2.判断文件类型
	if (!in_array($file['type'], $types)) {
		$info['msg'] = '亲，请严肃点，上传一个图片';
		return $info;
	}

// 3.判断文件大小
	if ($size > 0 && $file['size'] > $size) {
		$info['msg'] = '亲，图片太大了，受不了';
		return $info;
	}

// 4.判断并创建新的目录
	if (!file_exists($path)) mkdir($path, 0777, true);
// 5.随机生成文件名
	$sj = mt_rand(11111,99999).uniqid().'.'.pathinfo($file['name'], 4);
	$path = rtrim($path, '/').'/';	//处理path路径的斜杠
	$filename = $path.$sj;
	// echo $filename;
// 6.判断并上传文件
	if (is_uploaded_file($file['tmp_name'])) {
		if (move_uploaded_file($file['tmp_name'], $filename)) {
			$info['msg'] = '恭喜，上传成功';
			$info['name'] = $sj;
			$info['status'] = true;
		} else {
			$info['msg'] = '人品太差，上传失败';
		}
	} else {
			$info['msg'] = '人品太差，上传失败';
	}

	return $info;
}