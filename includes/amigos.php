<div class="blocos" id="meus-amigos">

	<?php $list_amigos = Amisade::list_amigos($idExtrangeiro); ?>

    <span>meus amigos(<?php echo $list_amigos['num'] ?>) <a href="#">todos</a></span>
    
    <ul>
    	<?php
		if($list_amigos['num']>0){
			foreach($list_amigos['dados'] as $resAmigos){
				echo '<li><a href="perfil.php?uid='.$resAmigos[0].'"><img src="uploads/usuarios/'.user_img($resAmigos[3]).'" alt="" title="'.$resAmigos[1].' '.$resAmigos[2].'" /></a></li>';
			}
		}else{
			echo 'Você não tem amigos';
		}
		?>
    </ul>
</div><!--blocos-->