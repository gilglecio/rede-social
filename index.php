<?php
	include 'classes/DB.class.php';
	include 'classes/Login.class.php';

	$objLogin = new Login;

	if ( ! $objLogin->logado()) {
		include 'login.php';
		exit;
	}

	if (true == $_GET['sair']) {
		$objLogin->sair();
		header('Location: ./');
	}

	$dados = $objLogin->getDados($_SESSION['socialbigui_usuario']);

	if ( ! is_null($dados)) {
		extract($dados, EXTR_PREFIX_ALL, 'user');
	}

	header('Location: ./');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Bigui.com - Home</title>
</head>
<body>

Logado <a href="?sair=true">Sair</a>.

</body>
</html>