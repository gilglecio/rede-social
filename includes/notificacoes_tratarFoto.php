<?php 
	
	foreach ($albuns as $idAlbum => $campos):

	extract($campos);

	$user_imagem = $user_imagem=='' ? 'default.png' : $user_imagem;

	echo '<li class="'.$tipo.' lista">';
?>

<div class="foto">
	<a title="<?=$user_nome?>" href="perfil.php?uid=<?=$user_id?>"><img src="uploads/usuarios/<?=$user_imagem?>" /></a>
</div>

<div class="right">

	<div class="header"><a href="perfil.php?uid=<?=$user_id?>"><?=$user_nome?></a> adicionou <?=$nFotos?> fotos ao album <a href="albuns.php?uid=<?=$user_id?>&aid=<?=$idAlbum?>"><?=$titulo?></a></div>

	<div class="imagens">
		<ul class="nFotos<?=$nFotos>4?4:$nFotos?>">
			<?php $i=0; foreach ($fotos as $foto): ?>
			<li><a href="albuns.php?uid=<?=$user_id?>&aid=<?=$idAlbum?>">
				<img src="uploads/fotos/<?=$foto?>" /></a></li>
			<?php $i++; if($i==4) break; endforeach?>
		</ul>	
	</div>

</div>

<?php echo '</li>';?>

<?php endforeach ?>