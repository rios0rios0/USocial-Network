<?php
/**
 * Created by PhpStorm.
 * User: rios0rios0
 * Date: 20/03/19
 * Time: 19:29
 */

class RoutesManagement
{
	public static $app = "/USocial-Network";

	public function __construct()
	{
	}

	public static function redirect($path)
	{
		$base = ((strpos($_SERVER["DOCUMENT_ROOT"], self::$app) !== false) ? "" : self::$app);
		header(sprintf("Location: %s%s", $base, $path));
	}

	public static function base_url()
	{
		$protocol = (isset($_SERVER["HTTPS"]) ? "https" : "http");
		$server = $_SERVER["SERVER_NAME"];
		return sprintf("%s://%s%s", $protocol, $server, ((self::$app !== "/") ? self::$app . "/" : self::$app));
	}
}