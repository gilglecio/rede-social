<?php
	
	
	
	if(isset($_POST['upload']) AND $_POST['upload']=='perfil'){
		$uid = $_POST['uid'];
		$imgantiga = $_POST['imgantiga'];
		
		if($imgantiga<>'default.png' AND file_exists('../uploads/usuarios/'.$imgantiga)){
			unlink('../uploads/usuarios/'.$imgantiga);
		}
		
		include('funcoes.php');
		
		$imagem = $_FILES['foto-perfil'];
		
		//EU FIZ O NOME DA IMAGEM ERRADA...
		//ERA PRA SER
		// $nome = $uid.sha1($imagem['name']).date('-his').'.jpg';
		
		$nome = sha1($imagem['name']).'-his'.'.jpg';
		
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
		$altura = ($largura * $_POST['h']) / $_POST['w'];
		
		$nova = imagecreatetruecolor($largura,$altura);
		
		imagecopyresampled($nova,$img,0,0,$_POST['x'],$_POST['y'],$largura,$altura,$_POST['w'],$_POST['h']);
		imagejpeg($nova,'../uploads/usuarios/'.$_POST['imagem'],80);
		header('Location: ../perfil.php');
	}
	
	header('Location: ../');
	