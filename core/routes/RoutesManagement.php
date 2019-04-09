<?php
/**
 * Created by PhpStorm.
 * User: rios0rios0
 * Date: 20/03/19
 * Time: 19:29
 */

class RoutesManagement
{
	public function __construct()
	{
	}

	public function redirect($path)
	{
		header("Location: " . $_SERVER['SERVER_NAME'] . $path);
	}
}