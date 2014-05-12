<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Bigui.com - Login</title>
</head>
<body>

<div id="login">

	<?php
 	if (isset($_POST['logar'])) {

 		if ($objLogin->logar($_POST['email'], $_POST['senha'], $_POST['lembrar'])) {
 			
 			header('Location: ./');
 			exit;
 		}

 		echo $objLogin->erro;
 	}
	?>

	<form name="login" enctype="multipart/form-data" action="" method="post">
		
	<input type="text" name="email">
	<input type="password" name="senha">
	<input type="checkbox" name="lembrar">
	<input type="submit" name="logar" value="logar">

	</form>
</div>

</body>
</html>