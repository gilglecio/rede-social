<?php
	session_start();
	
	header('Content-type: image/jpeg');
	
	$image = imagecreate(200,70);
	$fonte = 'arial.ttf';
	$corFundo = imagecolorallocate($image,255,255,255);
	$corLetra = imagecolorallocate($image,255,0,0);
	
	$tFonte = '50';
	$qtLetras = 4;
	
	$palavras = substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnPpQqRrSsTtUuVvYyXxWwZz23456789"),0,$qtLetras);
	
	$_SESSION['captchaCadastro'] = $palavras;
	
	for($i=1;$i<=$qtLetras;$i++){
		imagettftext($image,$tFonte,rand(-30,25),(($tFonte*$i)/1.5),$tFonte+5,$corLetra,$fonte,substr($palavras,($i-1),1));		
	}
	
	imagejpeg($image);
	imagedestroy($image);