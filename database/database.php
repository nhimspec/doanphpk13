<?php
class database
{
	private static $servername	="localhost";
	private static $username	="root";
	private static $password	="";
	private static $dbname		="doan";

	private static $conn		=null;

	public function __construct()
	{
		exit('Init function is not allowed');
	}
	public static function connect()
	{
		if (null == self::$conn)
		{
			self::$conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);
			self::$conn->set_charset("utf8");
			if (self::$conn->connect_error)
				{ 
					die("Kết nối database thất bại: " . self::$conn->connect_error);
				}
		}
		return self::$conn;
	}
	public static function disconnect()
	{
		self::$conn->close();
	}
}
?>