<?php
	
	
	
	if(isset($_POST['upload']) AND $_POST['upload']=='perfil'){
		$uid = $_POST['uid'];
		$imgantiga = $_POST['imgantiga'];
		
		if($imgantiga<>'default.png' AND file_exists('../uploads/usuarios/'.$imgantiga)){
			unlink('../uploads/usuarios/'.$imgantiga);
		}
		
		include('funcoes.php');
		
		$imagem = $_FILES['foto-perfil'];
		
		$nome = $uid.date('s').'.jpg';
		
		$ext = array('image/jpeg','image/pjpeg','image/jpg','image/gif','image/png');	
		
		if(in_array($imagem['type'],$ext)){
			upload($imagem['tmp_name'],$imagem['name'],$nome,700,'../uploads/usuarios');
			
			include('../classes/DB.class.php');
			$update = DB::getConn()->prepare('UPDATE `usuarios` SET `imagem`=? WHERE `id`=?');
			$update->execute(array($nome,$uid));
			
			if(file_exists('../uploads/usuarios/'.$nome)){
				header('Location: ../perfil.php?perfil=CROP');
				exit();
			}
		}
	}
	
	if(isset($_POST['salvar'])){
		$img = imagecreatefromjpeg('../uploads/usuarios/'.$_POST['imagem']);
		$largura = 160;
		$altura = (int)round(($largura * (int)$_POST['h']) / max(1, (int)$_POST['w']));
		
		$nova = imagecreatetruecolor($largura,$altura);
		
		imagecopyresampled($nova,$img,0,0,(int)$_POST['x'],(int)$_POST['y'],$largura,$altura,(int)$_POST['w'],(int)$_POST['h']);
		imagejpeg($nova,'../uploads/usuarios/'.$_POST['imagem'],80);
		header('Location: ../perfil.php');
		exit();
	}
	
	header('Location: ../');
	