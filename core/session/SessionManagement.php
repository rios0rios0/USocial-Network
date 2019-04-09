<?php
/**
 * Created by PhpStorm.
 * User: rios0rios0
 * Date: 20/03/19
 * Time: 19:29
 */

class SessionManagement
{
	public function __construct()
	{
		$this->create();
	}

	public function create()
	{
		session_start();
	}

	public function destroy()
	{
		session_destroy();
	}
}