<?php include('includes/header.php'); ?>        
        <div id="amarra-center-left">
        
            <div class="center">
               
                <div class="blocos" id="dexar-recados">
                    <h1><?php echo $user_nome.' '.$user_sobrenome ?>
                    
                    <?php 
					if($idDaSessao<>$idExtrangeiro){
						$e_meu_amigo = DB::getConn()->prepare('SELECT * FROM `amisade` WHERE (de=? AND para=?) OR (para=? AND de=?) LIMIT 1');
						$e_meu_amigo->execute(array($idDaSessao,$idExtrangeiro,$idDaSessao,$idExtrangeiro));
						
						if($e_meu_amigo->rowCount()==0){
							echo '<a href="php/amisade.php?ac=convite&de='.$idDaSessao.'&para='.$idExtrangeiro.'">adicionar amigo</a>';
						}else{
							$asstatusamisade = $e_meu_amigo->fetch(PDO::FETCH_ASSOC);
							if($asstatusamisade['status']==0){
								echo '<a href="php/amisade.php?ac=remover&id='.$asstatusamisade['id'].'&de='.$idDaSessao.'&para='.$idExtrangeiro.'">cancelar pedido</a>';
							}else{
								echo '<a href="php/amisade.php?ac=remover&id='.$asstatusamisade['id'].'&de='.$idDaSessao.'&para='.$idExtrangeiro.'">remover amigo</a>';
							}
						}
					}
					?>
                                        
                     <span></span></h1>
                    
                    <form name="dexar-recado" action="" method="post" enctype="multipart/form-data">
                        <input type="text" class="inputTxt" name="recado" value="Deixe um recado para seus amigos"  onfocus="if(this.value=='Deixe um recado para seus amigos')this.value='';" onblur="if(this.value=='')this.value='Deixe um recado para seus amigos';" /><input class="inputSub" type="submit" value="postar" />
                    </form>
                </div><!--blocos-->

                <div class="blocos" id="pagina">
                	<h2>perfil</h2>
                    
                    
                    
                </div><!--blocos-->
                
            </div><!--center-->
            
            <div class="right">
            
                <div class="blocos" id="publicidade">
                    <img src="midias/banner.gif" />
                </div><!--blocos-->
                
     			<?php include('includes/amigos.php'); ?>
                                
            </div><!--right-->

                    
        </div><!--amarra-center-left-->
        
<?php include('includes/footer.php'); ?>