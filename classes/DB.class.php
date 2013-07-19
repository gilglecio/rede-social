<?php
class DB
{
	private static $conn;
	static function getConn()
	{
		if(is_null(self::$conn)) {
			self::$conn = new PDO('mysql:host=localhost;dbname=aularedesocial','root','');
		}
		return self::$conn;
	}