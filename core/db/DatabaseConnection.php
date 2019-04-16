<?php
/**
 * Created by PhpStorm.
 * User: rios0rios0
 * Date: 20/03/19
 * Time: 19:29
 */

class DatabaseConnection
{
	private static $db = "social_db";
	private static $host = "localhost";
	private static $user = "root";
	private static $password = "1q2w!Q@W";
	private static $connection;

	public function __construct()
	{
	}

	public static function getInstance()
	{
		try {
			if (is_null(self::$connection)) {
				self::$connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$password);
				self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return self::$connection;
		} catch (PDOException $e) {
			error_log("Connection failed: " . $e->getMessage());
			echo $e->getMessage();
			die();
		}
	}

	public static function close()
	{
		self::$connection = null;
	}
}