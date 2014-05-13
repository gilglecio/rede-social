<div id="listAlbuns">

<h2><?php echo ($idDaSessao<>$idExtrangeiro) ? 'Albuns de '.$user_fullname.' ('.$albuns['num'].') ' : 'Meus albuns ('.$albuns['num'].') '; ?></h2>
    
    <?php if($idDaSessao==$idExtrangeiro){ ?>
    
    <hr />
    
    <?php 
    if(isset($_POST['criaralbum']) AND trim($_POST['tituloalbum'])<>''){
        $album = Albuns::newAlbum($user_id,$_POST['tituloalbum'],$_POST['descricao'],$_POST['permissao']);
        header('Location: albuns.php?uid='.$idDaSessao.'&aid='.$album.'&ac=ADD_FOTOS');
        exit();
    }
    ?>
    
    <form name="novoalbum" method="post" enctype="multipart/form-data" action="" >
        <input type="text" name="tituloalbum" /><br>
        <textarea name="descricao" ></textarea>
        
        <br>
        <input type="radio" name="permissao" checked="checked" value="2" /> amigos
        <input type="radio" name="permissao" value="3" /> publico
        <input type="radio" name="permissao" value="1" /> privado
        <br>
        <input type="submit" name="criaralbum" value="Add album" />
    </form>
    
    <?php } 
    
    if($albuns['num']>0){
        echo '<ul>';
		
		$visivel = Amisade::solicitacao($idDaSessao,$idExtrangeiro);
		
        foreach($albuns['dados'] as $resalbuns):
		
			$numfotos = Albuns::getAlbum($resalbuns['id']);
			$file = 'uploads/fotos/200/'.$resalbuns['capa'];
			$li = '<li><img src="'.(file_exists($file) ? $file : 'uploads/fotos/default.jpg' ).'" /><a href="albuns.php?uid='.$idExtrangeiro.'&aid='.$resalbuns['id'].'">'.$resalbuns['titulo'].'</a> ('.$numfotos['fotos']['num'].')</li>';			
			
			if($resalbuns['permissao']==1 AND $idDaSessao==$idExtrangeiro){
				echo $li;
			}elseif($resalbuns['permissao']==2){
				if($visivel['r']==2 OR $idDaSessao==$idExtrangeiro){
					echo $li;
				}				
			}elseif($resalbuns['permissao']==3){
				echo $li;
			}
		endforeach;
        echo '</ul>';
    }
	?>
	</div><!--listAlbuns-->