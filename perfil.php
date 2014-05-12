<?php include('includes/header.php'); ?>        
        <div id="amarra-center-left">
        
            <div class="center">
               
                <div class="blocos" id="dexar-recados">
                    <h2><?php echo ($idDaSessao<>$idExtrangeiro) ? $user_fullname : 'Meus perfil'; ?>
                    <span>
                    <?php 
					if($idDaSessao<>$idExtrangeiro){	
						
						$solicitacao = Amisade::solicitacao($idDaSessao,$idExtrangeiro);
						
						$link = '<a href="php/amisade.php?ac=';		
						
						if($solicitacao['r']==0){
							echo $link.'convite|'.$idDaSessao.'|'.$idExtrangeiro.'">adicionar amigo</a>';
						}elseif($solicitacao['r']==1){
							echo $link.'remover|'.$idDaSessao.'|'.$idExtrangeiro.'|'.$solicitacao['id'].'">cancelar pedido</a>';
						}elseif($solicitacao['r']==2){
							echo $link.'remover|'.$idDaSessao.'|'.$idExtrangeiro.'|'.$solicitacao['id'].'">remover amigo</a>';
						}
					}
					?>
                                        
                    </span></h2>
                    
                    
                </div><!--blocos-->

                <div class="blocos" id="pagina">
                	<h2>perfil</h2>
                    
                    <?php
					if(isset($_GET['perfil']) AND $_GET['perfil']=='UPLOAD'){
						
						?>
                        <form name="upload-foto-perfil" enctype="multipart/form-data" method="post" action="php/crop.php">
                        	<input type="file" name="foto-perfil" />
                            <input type="submit" value="recortar" />
                            <input type="hidden" name="imgantiga" value="<?php echo $user_imagem ?>" />
                            <input type="hidden" name="upload" value="perfil" />
                            <input type="hidden" name="uid" value="<?php echo $idDaSessao ?>"/>
                        </form>
                        <?php
						
					}
					?>
                    
                </div><!--blocos-->
                
            </div><!--center-->
            
            <div class="right">
            
                <?php include('includes/amigos.php'); ?>
                                
            </div><!--right-->

                    
        </div><!--amarra-center-left-->
        
<?php include('includes/footer.php'); ?>