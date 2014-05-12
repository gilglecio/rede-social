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
                	<h2>depoimentos</h2>
                </div><!--blocos-->
                
            </div><!--center-->
            
            <div class="right">
            
                <div class="blocos" id="publicidade">
                    <img src="midias/banner.gif" />
                </div><!--blocos-->
                
                <div class="blocos" id="meus-amigos">
                    <span>meus amigos(18) <a href="#">todos</a></span>
                    <ul>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                        <li><a href="#"><img src="midias/user.jpg" alt="" title="usuario" /></a></li>
                    </ul>
                </div><!--blocos-->
                                
            </div><!--right-->

                    
        </div><!--amarra-center-left-->
        
<?php include('includes/footer.php'); ?>