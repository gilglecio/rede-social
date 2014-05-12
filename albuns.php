<?php include('includes/header.php'); ?>        
        <div id="amarra-center-left">
        
            <div class="center">
               
                <div class="blocos" id="pagina">
                	 
                     <?php
					 if(isset($_GET['aid'])){
						 include('includes/list_fotos.php');
					 }else{
						 include('includes/list_albuns.php');
					 }
					 ?>
                     
                </div><!--blocos-->
                
            </div><!--center-->
            
            <div class="right">
            
                <?php include('includes/amigos.php'); ?>
                                
            </div><!--right-->
    
        </div><!--amarra-center-left-->
        
<?php include('includes/footer.php'); ?>