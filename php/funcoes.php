<?php

function crop($src, $options = array())
{
	$optDefault = Albuns::$options['crop'];

	foreach ($options as $key => $value)
		$optDefault[$key] = $value;

	list($path, $cortes, $quality) = array_values($optDefault);

	foreach ($cortes as $width):

		$img = imagecreatefromjpeg("$path/$src");

		$imgW = imagesx($img);
		$imgH = imagesy($img);

		if ($imgW > $imgH):
			# horizontal
			$altura = $width;
			$largura = ($altura * $imgW) / $imgH;

			$x = ($largura - $width) / 2;
			$y = 0;
		else:
			# vertical
			$largura = $width;
			$altura = ($largura * $imgH) / $imgW;

			$x = 0;
			$y = ($altura - $width) / 2;
		endif;

		$largura = (int)round($largura);
		$altura = (int)round($altura);
		$x = (int)round($x);
		$y = (int)round($y);

		if (!is_dir("$path/$width")) mkdir("$path/$width", 0775, true);

		$plano = imagecreatetruecolor($width, $width);

		imagecopyresampled($plano, $img, 0, 0, $x, $y, $largura, $altura, $imgW, $imgH);

		imagejpeg($plano, "$path/$width/$src", $quality);

		imagedestroy($img);
		imagedestroy($plano);

	endforeach;
}

function upload($tmp, $name, $nome, $larguraP, $pasta){
	
	$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
	
	if($ext=='jpg' OR $ext=='jpeg'){
		$img = imagecreatefromjpeg($tmp);
	}elseif($ext=='gif'){
		$img = imagecreatefromgif($tmp);
	}else{
		$img = imagecreatefrompng($tmp);
	}
	
	$x = imagesx($img);
	$y = imagesy($img);

	$largura = ($x>$larguraP) ? $larguraP : $x;
	$altura = ($largura*$y) / $x;
	
	if($altura>$larguraP){
		$altura = $larguraP;
		$largura = ($altura*$x) / $y;
	}
	
	$largura = (int)round($largura);
	$altura = (int)round($altura);

	$nova = imagecreatetruecolor($largura, $altura);
	imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
	imagejpeg($nova, "$pasta/$nome");
    imagedestroy($img);
	imagedestroy($nova);
	
	return $nome;
}