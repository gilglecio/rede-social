<?php
include('classes/DB.class.php');
include('classes/Login.class.php');

$objLogin = new Login;

if(!$objLogin->logado()){
	include('login.php');
	exit();
}

if(true==$_GET['sair']){
	$objLogin->sair();
	header('Location: ./');
}

$idExtrangeiro = (isset($_GET['uid'])) ? $_GET['uid'] : $_SESSION['socialbigui_uid'];
$idDaSessao = $_SESSION['socialbigui_uid'];

$dados = $objLogin->getDados($idExtrangeiro);

if(is_null($dados)){
	header('Location: ./');
	exit();
}else{
	extract($dados,EXTR_PREFIX_ALL,'user'); 
}

$user_imagem = (file_exists('/uploads/usuarios/'.$user_imagem)) ? $user_imagem : 'default.png';

?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset="utf-8" />
<title>Bigui.com - Home</title>
<link rel="stylesheet" media="screen" href="estilos/template.css" type="text/css" />
</head>

<body>

<div id="topo">
	<div class="cAlign">
        <span><?php echo $_SESSION['socialbigui_usuario'] ?> | <a href="#">configura&ccedil;&ocirc;es</a> | <a href="?sair=true">sair</a></span>
    </div><!--calign-->
</div><!--topo-->

<div class="cAlign">
    <div id="header">
    
    	<div class="left">
        	
        </div><!--left-->
        
        <div class="center">
      		<ul>
                <li><a href="./" class="ativo">inicio</a></li>
                <li><a href="perfil.php">perfil</a></li>
                <li><a href="recados.php">recados</a></li>
                <li><a href="videos.php">v&iacute;deos</a></li>
                <li><a href="depoimentos.php">depoimentos</a></li>
            </ul> 
        </div><!--left-->
        
        <div class="right">
        	<span>pesquisa</span>
            <form name="pesquisa-all" action="busca.php" method="get">
            	<input type="text" name="s" /><input type="submit" value="buscar" />
            </form>
        </div><!--left-->
    
    </div><!--header-->
    
    <div id="content">

		<div class="left">
        	
            <div class="blocos" id="foto-perfil">
            	<a href="#"><img src="uploads/usuarios/<?php echo $user_imagem; ?>" alt="<?php echo $user_nome ?>" title="<?php echo $user_nome ?>" /></a>
                <a href="#" id="alterar-foto">alterar foto</a>
            </div><!--blocos-->
            
            <div class="blocos" id="menu-lateral">
            	<ul>
                	<li><a href="perfil.php?uid=<?php echo $idExtrangeiro ?>" class="perfil">perfil</a></li>
                	<li><a href="recados.php?uid=<?php echo $idExtrangeiro ?>" class="recados">recados <span>(126)</span></a></li>
                	<li><a href="albuns.php?uid=<?php echo $idExtrangeiro ?>" class="fotos">fotos <span>(48)</span></a></li>
                    <li><a href="depoimentos.php?uid=<?php echo $idExtrangeiro ?>" class="depoimentos">depoimentos <span>(12)</span></a></li>
                    <li><a href="videos.php?uid=<?php echo $idExtrangeiro ?>" class="videos">v&iacute;deos <span>(36)</span></a></li>
                </ul>
            </div><!--blocos-->
            
        </div><!--left-->