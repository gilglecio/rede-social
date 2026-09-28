<?php
	class DB{
		private static $conn;
		static function getConn(){
			if(is_null(self::$conn)){
				$host = getenv('DB_HOST') ?: 'localhost';
				$name = getenv('DB_NAME') ?: 'redesocial';
				$user = getenv('DB_USER') ?: 'admin';
				$pass = getenv('DB_PASS') ?: '123';
				self::$conn = new PDO("mysql:host=$host;dbname=$name;charset=utf8mb4",$user,$pass);
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
		
		
		$arquivo = fopen(__DIR__.'/../logerro.txt','a');
		fwrite($arquivo,$strErro);
		fclose($arquivo);
		
		set_error_handler('logErros');
		
	}