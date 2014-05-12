<?php include('includes/header.php'); ?>        
        <div id="amarra-center-left">
        
            <div class="center">
               
            <?php
				if(isset($_GET['s']) AND $_GET['s']<>''){
					
					$explode = explode(' ',$_GET['s']);
					$numP = count($explode);
					
					for($i=0;$i<$numP;$i++){
						$busca .= " ( `nome` LIKE :busca$i OR `sobrenome` LIKE :busca$i ) ";
						if($i<>$numP-1){ $busca .= ' AND '; }
					}
														
					$buscar = DB::getConn()->prepare("SELECT * FROM `usuarios` WHERE $busca");
					
					for($i=0;$i<$numP;$i++){
						$buscar->bindValue(":busca$i",'%'.$explode[$i].'%',PDO::PARAM_STR);
					}
					
					$buscar->execute();
					
					if($buscar->rowCount()>0){
						echo '<ul>';
						while($resbusca=$buscar->fetch(PDO::FETCH_ASSOC)){
							echo '<li><a href="perfil.php?uid='.$resbusca['id'].'">'.$resbusca['nome'].' '.$resbusca['sobrenome'].'</a></li>';
						}
						echo '</ul>';
					}
					
				}else{
					echo 'Sem resultados';
				}
			?>
                
            </div><!--center-->
            
            <div class="right">
            
                <div class="blocos" id="publicidade">
                    <img src="midias/banner.gif" />
                </div><!--blocos-->
                
     			<?php include('includes/amigos.php'); ?>
                                
            </div><!--right-->

                    
        </div><!--amarra-center-left-->
        
<?php include('includes/footer.php'); ?>