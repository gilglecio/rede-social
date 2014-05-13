<div id="galeria">
<?php
if($minhasfotos['fotos']['num']>0){
	echo '<ul>';	
	
	$verFoto = array();
	
	foreach($minhasfotos['fotos']['dados'] as $resfotos):
		
		if($resfotos['id']==$_GET['fid']){
			$verFoto[] = $resfotos;
		}
	
		echo '<li><span><a href="albuns.php?uid='.$idExtrangeiro.'&aid='.(int)$_GET['aid'].'&fid='.$resfotos['id'].'"><img src="uploads/fotos/100/'.$resfotos['foto'].'" width="80" /></a></span></li>';
	endforeach;
	echo '</ul>';
	
}else{
	echo 'Sem fotos neste album';
}

if(empty($verFoto)){
	header('Location: albuns.php');
	exit();
}

echo '<img class="atualfotogaleria" src="uploads/fotos/'.$verFoto[0]['foto'].'" />';
?>
</div><!--galeria-->