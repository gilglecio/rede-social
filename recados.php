<?php include('includes/header.php'); ?>        
        <div id="amarra-center-left">

            <div class="center">
               
                <div class="blocos" id="pagina">
                	<h2><?php echo ($idDaSessao<>$idExtrangeiro) ? 'Recados de '.$user_fullname : 'Meus recados'; ?></h2>
                    <?php include('includes/form_recados.php'); ?>
                    
                    <div id="listrecados">
                    	<?php
						if($recados['num']>0){
							echo '<ul>';
							foreach($recados['dados'] as $asRecados){
								echo '<li>'.$asRecados[1].' disse '.$asRecados[7].'</li>';
							}
							echo '</ul>';
						}
						?>
                    </div>
                    
                </div><!--blocos-->
                
            </div><!--center-->
            
            <div class="right">
            
                <?php include('includes/amigos.php'); ?>
                                
            </div><!--right-->

                    
        </div><!--amarra-center-left-->
        
<?php include('includes/footer.php'); ?>