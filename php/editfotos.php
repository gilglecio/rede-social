<?php

	session_start();
	
		$uid = (int)$_SESSION['socialbigui_uid'];
		include('../classes/DB.class.php');
		include('../classes/Allbuns.class.php');

	
	if(isset($_POST['album'])){
		
		$capa = $_POST['capa'];
		$album = (int)$_POST['album'];
		
		if(Albuns::meuAlbum($album,$uid)){
			
				Albuns::editAlbum($album, array('capa'=>$capa));
			
			}
		
		
	}
	
	if(isset($_POST['foto'])){
	
		$id = end(explode('-',$_POST['foto']));
		
		$legenda = strip_tags(trim($_POST['legenda']));	
					
		$result = Albuns::minhaFoto($id,$uid);
		echo $id;
		if($result['res']){
		
			Albuns::editFotos($id, array('legenda'=>$legenda));		
		}
	}
	
?>