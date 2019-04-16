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

	public function __construct()
	{
	}

	public static function redirect($path)
	{
		header("Location: /" . self::$app . $path);
	}
}