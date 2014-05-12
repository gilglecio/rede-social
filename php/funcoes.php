<?php
	
function upload($tmp, $name, $nome, $larguraP, $pasta){
	
	$ext = strtolower(end(explode('.',$name)));
	
	if($ext=='jpg'){
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
	
	$nova = imagecreatetruecolor($largura, $altura);
	imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
	imagejpeg($nova, "$pasta/$nome");
    imagedestroy($img);
	imagedestroy($nova);
	
	return $nome;
}