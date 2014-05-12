<?php
	include('../classes/DB.class.php');
	include('../classes/Amisade.class.php');

	include('../classes/Notificacoes.class.php');
	
	$acE = explode('|',$_GET['ac']);
	
	if($acE[0]=='convite'){
		if(Amisade::setAmigo($acE[1],$acE[2])) header('Location: ../perfil.php?uid='.$acE[2]);		
		exit();
		
	}elseif($acE[0]=='remover'){
		if(Amisade::delAmigo($acE[3])) header('Location: ../perfil.php?uid='.$acE[2]);
		exit();
		
	}elseif($acE[0]=='aceitar'){
		if(Amisade::aceitarAmigo($acE[1])) header('Location: ../perfil.php');
		exit();		
	}