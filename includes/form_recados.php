<div id="dexar-recados">

	<script type="text/javascript">
	$(function(){
		$('#recadoinput').click(function(){
			$(this).fadeOut();
			$('#contentformrecado').fadeIn();
			$('#contentformrecado textarea').focus();
		});
		$('#cancelarformrecado').click(function(){
			$('#recadoinput').fadeIn();
			$('#contentformrecado').fadeOut();
		});
		$('#recadopara').change(function(){
			if($('#recadopara').val()=='selecionar'){
				$('#marcrecadosamigos').fadeIn();
			}else{
				$('#marcrecadosamigos').fadeOut();
			};
		});
	});
	</script>

    <?php $txt_for_recado = ($idDaSessao<>$idExtrangeiro) ? 'Deixe um recado para '.$user_fullname : 'Deixe um recado para seus amigos' ; 
	
	if(isset($_POST['postarrecado'])){
		
		if($_POST['recadopara']=='selecionar'){
			$para = $_POST['recadoamigos'];
		}else{
			$para = (!isset($_POST['recadopara'])) ? $idExtrangeiro : $_POST['recadopara'];
		}

		Recados::setRecado($idDaSessao,$para,$_POST['txtrecado']);
	}
	
	?>
    
    <div id="recadoinput"><?php echo  $txt_for_recado; ?></div>
    
    <div id="contentformrecado">
    	<form name="dexar-recado" action="" method="post" enctype="multipart/form-data">
             
        	<?php if($idDaSessao==$idExtrangeiro): ?>
        	<select id="recadopara" name="recadopara">
            	<option value="amigos">amigos</option>
                <option value="selecionar">selecionar</option>
                <option value="publico">publico</option>
            </select>
            <?php endif; ?>
            
            <div id="marcrecadosamigos">
        	<ul>
				<?php
                if($list_amigos['num']>0){
                    foreach($list_amigos['dados'] as $resAmigos){
                        echo '<li><label><input type="checkbox" value="'.$resAmigos[0].'" name="recadoamigos[]" class="checkrecadoamigos" /><img title="'.$resAmigos[1].' '.$resAmigos[2].'" src="uploads/usuarios/'.user_img($resAmigos[3]).'" /></label></li>';
                    }
                }else{
                    echo 'Você não tem amigos';
                }
                ?>
            </ul>
        </div><!--marcrecadosamigos-->
            
            <textarea name="txtrecado" id="txtrecado"></textarea>
            <input type="submit" value="postar" id="postarrecado" name="postarrecado" />  <a id="cancelarformrecado" href="javascript:void(0);">cancelar</a>
        </form>
    </div>
    
    
    
    
    
</div><!--blocos-->