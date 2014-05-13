<?php
	
	session_start();
	
	if(isset($_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD']=='POST'){
		
		include('funcoes.php');
		include('../classes/DB.class.php');
		include('../classes/Allbuns.class.php');
		include('../classes/Notificacoes.class.php');
		
		$album = (int)$_POST['album'];
		
		$uid = (int)$_POST['uid'];
		
		$fotos = $_FILES['fotos'];
		$nome = sha1($fotos['name'].$album.$uid).'.jpg';
		
		if ( Albuns::addFotos($album,$uid,$nome)){

			$fotoId = DB::getConn()->lastInsertId();

			upload($fotos['tmp_name'],$fotos['name'],$nome,500,'../uploads/fotos');

			$log = Notificacoes::add($uid, 1, $album.':'.$fotoId.':'.$nome);

			echo 1;
			exit();
		}
		
	}
	echo 0;