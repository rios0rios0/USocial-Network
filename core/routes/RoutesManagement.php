<?php
/**
 * Created by PhpStorm.
 * User: rios0rios0
 * Date: 20/03/19
 * Time: 19:29
 */

class RoutesManagement
{
	private static $app = "USocial-Network";
	private static $base_url = "/";

	public function __construct()
	{
	}

	public static function redirect($path)
	{
		header("Location: /" . self::$app . $path);
	}

	public static function base_url()
	{
		$protocol = ((isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"]) != "off" ? "https" : "http");
		$server = $_SERVER['SERVER_NAME'];
		return sprintf("%s://%s%s", $protocol, $server, self::$base_url);
	}
}