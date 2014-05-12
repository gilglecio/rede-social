<?php include('includes/header.php'); ?>        
        <div id="amarra-center-left">
        
            <div class="center">
               
                <div class="blocos" id="pagina">
                	<h2><?php echo ($idDaSessao<>$idExtrangeiro) ? 'Depoimentos de '.$user_fullname : 'Meus depoimentos'; ?></h2>
                </div><!--blocos-->
                
            </div><!--center-->
            
            <div class="right">
            
                 <?php include('includes/amigos.php'); ?>
                                
            </div><!--right-->

                    
        </div><!--amarra-center-left-->
        
<?php include('includes/footer.php'); ?>