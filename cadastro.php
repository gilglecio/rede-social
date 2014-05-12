<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Bigui.com - Cadastro</title>
        <link rel="stylesheet" href="estilos/cadastro.css" type="text/css" />
    </head>
    
    <body>
    
    	<div id="topo">
        	<div class="cAlign">
        		<span><a href="#"><img src="images/logo.png" alt="" border="0" /></a></span> <p><a href="#">portal</a><a href="#">forum</a><a href="#">blog</a></p>
          	</div><!---cAlign-->
        </div><!--topo-->
        
        <div class="cAlign">
        
            <div id="content">
                
                <div id="left">
                	
                    <ul>
                    	<li>data de nascimento</li>
                        <li>eu sou</li>
                        <li>seu e-mail</li>
                        <li>nova senha</li>
                        <li>Verificação contra fraudes</li>
                    </ul>
                    
                </div><!--left-->
                
                <h1>Cadastre-se, <span>é gratis</span></h1>
                
            	<div id="formulario">
                	
                    <?php
						if(isset($_SERVER['REQUEST_METHOD']) AND $_SERVER['REQUEST_METHOD'] == 'POST'){
							
							extract($_POST);
							
							echo '<h3>';
														
							if($nome == '' OR strlen($nome)<4){
								echo 'Escreva seu nome corretamente';
							}elseif($sobrenome=='' OR strlen($sobrenome)<6){
								echo 'Escreva seu sobrenome corretamente';
							}elseif($email==''){
								echo 'Escreva seu e-mail';
							}elseif(!preg_match("/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$/i",$email)){
								echo 'Este e-mail é invalido';
							}else{
								
								include('classes/DB.class.php');
								
								try{
																
								$verificar = DB::getConn()->prepare("SELECT `id` FROM `usuarios` WHERE `email`=?");
								if($verificar->execute(array($email))){
									if($verificar->rowCount()>=1){
										echo 'Este e-mail ja esta cadastrado em nosso sistema';
										
									}elseif($senha=='' OR strlen($senha)<4){
										echo 'Digite sua senha, ela tem de ter mais de 4 caracteres';
									}elseif(strtolower($captcha) <> strtolower($_SESSION['captchaCadastro'])){
										echo 'O cadigo digitado no captcha n corresponde com a imagem';
									}else{
										$senhaInsert = sha1($senha);
										$nascimento = "$ano-$mes-$dia";
										
										$inserir = DB::getConn()->prepare("INSERT INTO `usuarios` SET `email`=?, `senha`=?, `nome`=?, `sobrenome`=?, `sexo`=?, `nascimento`=?, `cadastro`=NOW()");
										
										if($inserir->execute(array($email,$senhaInsert,$nome,$sobrenome,$sexo,$nascimento))){
											header('Location: ./');
										}
									}
								}
								}catch(PDOException $e){
									echo 'Sistema indisponível';
									logErros($e);
								}
							}
							echo '</h3>';
						}						
					?>
                    
                    <form name="cadastro" action="" method="post">
                    	<div>
                        	<div class="inputFloat">
                            	<span>nome</span>
                            	<input type="text" class="txtImput" name="nome" value="<?php if(isset($nome)) echo $nome; ?>" />
                            </div><!--inputFloat-->
                            
                            <div class="inputFloat">
                            	<span>sobrenome</span>
                            	<input type="text" class="txtImput" name="sobrenome" value="<?php if(isset($sobrenome)) echo $sobrenome; ?>" />
                            </div><!--inputFloat-->
                      	</div>
                        
                        <span class="spanHide">data de nascimento</span>
                        <select name="dia">
                        	<?php
							for($d=1;$d<=31;$d++){
								$zero = ($d<10) ? 0 : '';
								if(isset($dia) AND $dia==$zero.$d){
									echo '<option selected="selected" value="',$zero,$d,'">',$zero,$d,'</option>';
								}else{
									echo '<option value="',$zero,$d,'">',$zero,$d,'</option>';
								}
							}
							?>
                            
                        </select>
                            
                        <select name="mes">
                        	<?php
							$meses = array('','janeiro','fevereiro','mar&ccedil;o','abril','maio','junho','julho','agosto','setembro','outubro','novembro','dezembro');
							for($m=1;$m<=12;$m++){
								$zero = ($m<10) ? 0 : '';
								if(isset($mes) AND $mes == $zero.$m){
									echo '<option selected="selected" value="',$zero,$m,'">',$meses[$m],'</option>';
								}else{
									echo '<option value="',$zero,$m,'">',$meses[$m],'</option>';
								}
							}
							?>
                            
                        </select>
                            
                        <select name="ano">
                        	<?php
							for($a=date('Y');$a>=(date('Y')-100);$a--){
								if(isset($ano) AND $ano == $a){
									echo '<option selected="selected" value="',$a,'">',$a,'</option>';
								}else{
									echo '<option value="',$a,'">',$a,'</option>';
								}
							}
							?>
                            
                        </select>
                        
                        <span class="spanHide">eu sou</span>
                        <select name="sexo">
                            <option <?php if(isset($sexo) AND $sexo == 'mesculino') echo 'selected="selected"'; ?>  value="masculino">Masculino</option>
                            <option <?php if(isset($sexo) AND $sexo == 'feminino') echo 'selected="selected"'; ?>  value="feminino">Feminino</option>
                        </select>
                        
                        <span class="spanHide">eu sou</span>
                        <input class="txtImput" type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" />
                        
                        <span class="spanHide">nova senha</span>
                        <input type="password" class="txtImput" name="senha" value="<?php if(isset($senha))echo $senha; ?>" />
                        
                        <span class="spanHide">verificação contra fraudes</span>
                        <div class="captchaFloat"><img src="captcha/captcha.php" /></div>
                        
                        <div class="inputFloat">
                        	<span>digite os caracteres ao lado</span>
                        	<input class="txtImput" type="text" name="captcha" />
                        </div><!--inputFloat-->
                    
                    	<span>&nbsp;</span>
                        <input class="submitCadastro" border="0" type="submit" value="" />
                    </form>
                </div><!--formulario-->
            </div><!--content-->
    	</div><!--cAlign-->
        
        <div id="footer">
        	<p>&copy;Copyright Bigui.com 2011 - Todos os direitos reservados</p>
        </div><!--footer-->
        
    </body>
</html>