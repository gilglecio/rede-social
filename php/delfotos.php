<?php

	session_start();
	
	if(isset($_POST['foto'])){
	
		include('../classes/DB.class.php');
		include('../classes/Allbuns.class.php');
	
		$id = end(explode('-',$_POST['foto']));
		
		$uid = $_SESSION['socialbigui_uid'];
		
		$result = Albuns::minhaFoto($id,$uid);
		
		if($result['res']){
		
			if(Albuns::delFoto($id)){			
				
				if(file_exists('../uploads/fotos/'.$result['foto'])){
					unlink('../uploads/fotos/'.$result['foto']);
				}
			}
		}
	}
	

?>