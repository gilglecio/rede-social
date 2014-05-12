<?php
	include('../classes/DB.class.php');
	
	if(''<>$_GET['ac']){
		
		if($_GET['ac']=='convite'){
			
			$e_meu_amigo = DB::getConn()->prepare('SELECT * FROM `amisade` WHERE (de=? AND para=?) OR (para=? AND de=?) LIMIT 1');
			$e_meu_amigo->execute(array($_GET['de'],$_GET['para'],$_GET['de'],$_GET['para']));
			
			if($e_meu_amigo->rowcount()==0){
			
				$convite = DB::getConn()->prepare('INSERT INTO `amisade` SET `de`=?, `para`=?');
				$convite->execute(array($_GET['de'],$_GET['para']));
				
				header('Location: ../perfil.php?uid='.$_GET['para']);
			
			}
			
		}	
		
		
		if($_GET['ac']=='remover'){
			
			$e_meu_amigo = DB::getConn()->prepare('SELECT * FROM `amisade` WHERE (de=? AND para=?) OR (para=? AND de=?) LIMIT 1');
			$e_meu_amigo->execute(array($_GET['de'],$_GET['para'],$_GET['de'],$_GET['para']));
			
			if($e_meu_amigo->rowcount()==1){
			
				$convite = DB::getConn()->prepare('DELETE FROM `amisade` WHERE `id`=?');
				$convite->execute(array($_GET['id']));
				
				header('Location: ../perfil.php?uid='.$_GET['para']);
			
			}
			
		}	
		
		if($_GET['ac']=='aceitar'){
			
			
				$convite = DB::getConn()->prepare('UPDATE `amisade` SET `status`=1 WHERE `id`=?');
				$convite->execute(array($_GET['id']));
				
				header('Location: ../perfil.php');
			
		}
		
			
	}