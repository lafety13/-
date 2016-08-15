<?php 
/*
* Mysql database class - only one connection alowed
*/
class Database
{
	private $_connection;
	//The single instance
	private static $_instance = NULL;

	private function __clone(){}
	private function __wakeup(){}
	private function __construct(){
		$params = include ('../config/params.php');

 		$dsn = "mysql:host={$params['host']};dbname={$params['db']}";
        $opt = [
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		];
		$this->_connection = new PDO($dsn, 
			$params['user'], 
			$params['password'],
			 $opt);
	}
	// If no instance then make one
	public static function getInstance()
	{
		if (self::$_instance === NULL) {
			return new self;
		}
		return self::$_instance;
	}

	public function getConnection()
	{
		return $this->_connection;
	}
}
