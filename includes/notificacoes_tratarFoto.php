<?php $nFotos = count($cache['fotos'][$albumId]) ?>

<li class="<?php echo $tipo ?> lista">

	<div class="foto">
		<a title="<?php echo $userNome ?>" href="perfil.php?uid=<?php echo $userId ?>"><img src="uploads/usuarios/<?php echo $userImagem ?>" /></a>
	</div>

	<div class="right">

		<div class="header">
			<a href="perfil.php?uid=<?php echo $userId ?>"><?php echo $userNome?></a> 
				dicionou <?php echo $nFotos ?> fotos em 
					<a href="albuns.php?uid=<?php echo $userId ?>&aid=<?php echo $albumId ?>"><?php echo $albumTitulo ?></a></div>

		<div class="imagens">

			<ul class="nFotos<?php echo $nFotos > 4 ? 4 : $nFotos ?>">

				<?php $i=0; foreach ($cache['fotos'][$albumId] as $fotoId => $fotoSRC): ?>

				<li><a href="albuns.php?uid=<?php echo $userId ?>&aid=<?php echo $albumId ?>&fid=<?php echo $fotoId ?>">
					<img src="uploads/fotos/200/<?php echo $fotoSRC ?>" />
				</a></li>

				<?php $i++; if($i==4) break; endforeach?>
			</ul>	
		</div>

	</div>
</li>