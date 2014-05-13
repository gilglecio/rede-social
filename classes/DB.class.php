<?php
	class DB{
		private static $conn;
		static function getConn(){
			if(is_null(self::$conn)){
				self::$conn = new PDO('mysql:host=localhost;dbname=aularedesocial','root','123');
				self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}
			return self::$conn;
		}
	}
	
	function logErros($errno){
		
		if(error_reporting()==0) return;
		
		$exec = func_get_arg(0);
		
		$errno = $exec->getCode();
		$errstr = $exec->getMessage();
		$errfile = $exec->getFile();
		$errline = $exec->getLine();
		$err = 'CAUGHT EXCEPTION';
		
		if(ini_get('log_errrors')) error_log(sprintf("PHP %s: %s in %s on line %d",$err,$errstr,$errfile,$errline));
		
		$strErro = 'erro: '.$err.' no arquivo: '.$errfile.' ( linha '.$errline.' ) :: IP('.$_SERVER['REMOTE_ADDR'].') data:'.date('d/m/y H:i:s')."\n";
		
		
		$arquivo = fopen('logerro.txt','a');
		fwrite($arquivo,$strErro);
		fclose($arquivo);
		
		set_error_handler('logErros');
		
	}