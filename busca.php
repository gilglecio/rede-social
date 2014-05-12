<?php include('includes/header.php'); ?>        
        <div id="amarra-center-left">
        
            <div class="center" id="busca">
               
            <?php
				if(isset($_GET['s']) AND $_GET['s']<>''){
					
					$explode = explode(' ',$_GET['s']);
					$numP = count($explode);
					
					if($numP==1){
						$busca = ' `nome` LIKE :nome ';
					}else{
						$busca = ' `nome`=:nome  AND `sobrenome` LIKE :sobrenome ';
					}
					$buscar = DB::getConn()->prepare("SELECT * FROM `usuarios` WHERE $busca");
					
					if($numP==1){
						$buscar->bindValue(":nome",'%'.$explode[0].'%',PDO::PARAM_STR);
					}else{
						$buscar->bindValue(":nome",$explode[0],PDO::PARAM_STR);
						$buscar->bindValue(":sobrenome",'%'.$explode[1].'%',PDO::PARAM_STR);						
					}
					$buscar->execute();
					
					if($buscar->rowCount()>0){
						echo '<ul>';
						while($resbusca=$buscar->fetch(PDO::FETCH_ASSOC)){
							
							if($resbusca['id']<>$user_id){
								
								$idade = (date('Y')-date('Y',strtotime($resbusca['nascimento'])));
								$idade = ($idade==0) ? '' : 'tenho '.$idade.', ';
								$genero = ($resbusca['sexo']=='feminino') ? 'mulher' : 'homem';
								
								echo '<li><span><img src="uploads/usuarios/'.user_img($resbusca['imagem']).'" /></span>
								<h2><a href="perfil.php?uid='.$resbusca['id'].'">'.$resbusca['nome'].' '.$resbusca['sobrenome'].'</a></h2>
								<p>'.$idade.$genero.'</p></li>';
							
							}
						}
						echo '</ul>';
					}
					
				}else{
					echo 'Sem resultados';
				}
			?>
                
            </div><!--center-->
            
            <div class="right">
            
                <?php include('includes/amigos.php'); ?>
                                
            </div><!--right-->

                    
        </div><!--amarra-center-left-->
        
<?php include('includes/footer.php'); ?>