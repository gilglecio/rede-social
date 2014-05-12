<?php include('includes/header.php'); ?>        
        <div id="amarra-center-left">
        
            <div class="center">
               
                <div class="blocos" id="dexar-recados">
                    <h1><?php echo $user_nome.' '.$user_sobrenome ?></h1>
                    
                    <form name="dexar-recado" action="" method="post" enctype="multipart/form-data">
                        <input type="text" class="inputTxt" name="recado" value="Deixe um recado para seus amigos"  onfocus="if(this.value=='Deixe um recado para seus amigos')this.value='';" onblur="if(this.value=='')this.value='Deixe um recado para seus amigos';" /><input class="inputSub" type="submit" value="postar" />
                    </form>
                </div><!--blocos-->

                <div class="blocos" id="pagina">
                	<h2>atualizações</h2>
                    
                    <?php 
					$solicitacoes = DB::getConn()->prepare('SELECT * FROM `amisade` WHERE para=? ANd `status`=0');
					$solicitacoes->execute(array($idDaSessao));
					
					$dadosamisade = DB::getConn()->prepare("SELECT `nome`,`sobrenome` FROM `usuarios` WHERE `id`=? LIMIT 1");
					
					if($solicitacoes->rowcount()>0){
						$link = '<a href="php/amisade.php?ac=';
						echo '<ul>';
						while($resmeuamigo=$solicitacoes->fetch(PDO::FETCH_ASSOC)){
							
							$dadosamisade->execute(array($resmeuamigo['de']));
							$asdadsoamisade = $dadosamisade->fetch(PDO::FETCH_ASSOC);
							
							echo '<li>'.$asdadsoamisade['nome'].' '.$asdadsoamisade['sobrenome'].' quer ser seu amigo '.
							$link.'aceitar|'.$resmeuamigo['id'].'">aceitar</a> '.
							$link.'remover|'.$resmeuamigo['de'].'|'.$idDaSessao.'|'.$resmeuamigo['id'].'">recusar</a></li>';
						}
						echo '</ul>';
					}
				
					?>
                    
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