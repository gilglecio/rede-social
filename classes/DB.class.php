<?php
class DB
{
	private static $conn;
	static function getConn()
	{
		if(is_null(self::$conn)) {
			self::$conn = new PDO('mysql:host=localhost;dbname=aularedesocial','root','');
			self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$conn;
	}
}

function logErrors ($errno)
{
	if (error_reporting() == 0)
		return;

	$exec = func_get_arg(0);

	$errno = $exec->getCode();
	$errstr = $exec->getMessage();
	$errfile = $exec->getFile();
	$errline = $exec->getLine();
	$err = 'CAUGHT EXCEPTION';

	if (ini_get('log_errors'))
		error_log(sprintf('PHP %s: %s in %s on line %d', $err, $errstr, $errfile, $errline));

	$strErro = 'Erro: '.$err.' no arquivo: '.$errfile.' (linha '.$errline.') :: IP('.$_SERVER['REMOTE_ADDR'].') Data: '.date('d/m/y H:i:s')."\n";

	$arquivo = fopen('logerror.txt', 'a');
	fwrite($arquivo, $strErro);
	fclose($arquivo);

	set_error_handler('logErrors');
}