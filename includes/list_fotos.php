<?php
$minhasfotos = Albuns::getAlbum((int)$_GET['aid']);

if(empty($minhasfotos)){
	header('Location: albuns.php');
	exit();
}

if($minhasfotos['album']['permissao']==1 AND $idDaSessao<>$idExtrangeiro){
	header('Location: albuns.php');
	exit();
	
}elseif($minhasfotos['album']['permissao']==2){
	
	$visivel = Amisade::solicitacao($idDaSessao,$idExtrangeiro);
	
	if($visivel['r']<>2 AND $idDaSessao<>$idExtrangeiro){
		header('Location: albuns.php');
		exit();
	}				
}
?>

<script type="text/javascript">
	$('div').delegate('a.delfotos','click',function(){
		if(confirm('Deseja mesmo remover esta foto?')){
			$(this).parent('li').remove();			
			$('#numfotos').html( $('#numfotos').html()-1 );
			$.post('php/delfotos.php',{foto:$(this).attr('id')});			
		};
		return false;
	});
	
	$('div').delegate('.editLegenda','click',function(){
			$(this).parent().children('.delfotos').hide();
			
			var legenda = $(this).html();			
			$(this).parent().append('<input type="text" id="input'+$(this).attr('id')+'" value="'+legenda+'" class="newLegenda" />');
			$(this).remove();
		return false;
	});
	
	$('div').delegate('.newLegenda','keydown',function(e){
		
			if(e.keyCode==13){
				
				var nova_legenda = $(this).val();
				$(this).parent().children('.delfotos').show();
				$(this).parent().append('<p id="editFoto-'+$(this).attr('id')+'" class="editLegenda">'+nova_legenda+'</p>')
				
				$.post('php/editfotos.php',{foto:$(this).attr('id'), legenda:nova_legenda});
				
				$(this).remove();
				return false;
			};	
			
		
	});
	
	
	$('div').delegate('a.definirCapa','click',function(){
		if(confirm('Deseja mesmo definir esta foto como sendo a capa deste album?')){
			$.post('php/editfotos.php',{album:<?php echo $minhasfotos['album']['id'] ?>, capa:$(this).attr('lang')});			
			$(this).remove();
		};
		return false;
	});
</script>

<h2><?php echo $minhasfotos['album']['titulo'].' (<b id="numfotos">'.$minhasfotos['fotos']['num'].'</b>)' ?> <a href="albuns.php?uid=<?php echo $idExtrangeiro; ?>">voltar para os albuns de <?php echo $user_nome ?></a></h2>

<?php
if(isset($_GET['fid'])){
	include('galeria.php');
	exit();
}
?>
<div id="listFotos">
<?php if(Albuns::meuAlbum((int)$_GET['aid'],$idExtrangeiro) AND $idDaSessao==$idExtrangeiro){ ?><p><a href="albuns.php?uid=<?php echo $idDaSessao ?>&aid=<?php echo (int)$_GET['aid'] ?>&ac=ADD_FOTOS">Adicionar fotos</a></p><?php } 

if(isset($_SESSION['addcapaalbum'.(int)$_GET['aid']])) unset($_SESSION['addcapaalbum'.(int)$_GET['aid']]);

?>

<?php
if(isset($_GET['ac']) AND $_GET['ac']=='ADD_FOTOS' AND $idDaSessao==$idExtrangeiro){
	include('includes/addFotos.php');
	exit();
}
if($minhasfotos['fotos']['num']>0){
	echo '<ul>';
	foreach($minhasfotos['fotos']['dados'] as $resfotos):
		echo '<li><a href="albuns.php?uid='.$idExtrangeiro.'&aid='.(int)$_GET['aid'].'&fid='.$resfotos['id'].'"><img src="uploads/fotos/200/'.$resfotos['foto'].'" width="200" /></a>';
		
		echo $idDaSessao==$idExtrangeiro ? '<a class="delfotos" id="delFoto-'.$resfotos['id'].'" href="javascript:void(0);">excluir</a>' : '';
		
		if($minhasfotos['album']['capa'] != $resfotos['foto'] AND $idDaSessao==$idExtrangeiro){
			echo ' <a href="javascript:void(0);" lang="'.$resfotos['foto'].'" class="definirCapa">CAPA</a>';
		}
		if($idDaSessao==$idExtrangeiro){
			echo $resfotos['legenda'] == '' ? ' <a class="editLegenda" id="editFoto-'.$resfotos['id'].'" title="Adicionar uma legenda" href="javascript:void(0);">Add</a>' : '<p id="editFoto-'.$resfotos['id'].'" class="editLegenda">'.$resfotos['legenda'].'</p>';
		}else{
			echo $resfotos['legenda'] == '' ? '' : '<p>'.$resfotos['legenda'].'</p>';
		}
	echo '</li>';
	endforeach;
	echo '</ul>';
	
}else{
	echo 'Sem fotos neste album';
}
?>
</div><!--listFotos-->