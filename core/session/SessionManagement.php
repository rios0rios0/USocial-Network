<?php
/**
 * Created by PhpStorm.
 * User: rios0rios0
 * Date: 20/03/19
 * Time: 19:29
 */

class SessionManagement
{
	const SESSION_STARTED = true;
	const SESSION_NOT_STARTED = false;
	private $state = self::SESSION_NOT_STARTED;
	private static $instance;

	private function __construct()
	{
	}

	public static function getInstance()
	{
		if (!isset(self::$instance)) {
			self::$instance = new self;
		}
		self::$instance->create();
		return self::$instance;
	}

	public function create()
	{
		if ($this->state == self::SESSION_NOT_STARTED) {
			$this->state = session_start();
		}
		return $this->state;
	}

	public function __set($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	public function __get($name)
	{
		return (isset($_SESSION[$name]) ? $_SESSION[$name] : null);
	}

	public function __isset($name)
	{
		return isset($_SESSION[$name]);
	}

	public function __unset($name)
	{
		unset($_SESSION[$name]);
	}

	public function logged()
	{
		return (isset($_SESSION["logged_user"]) && ($_SESSION["logged_user"]));
	}

	public function destroy()
	{
		if ($this->state == self::SESSION_STARTED) {
			$this->state = !session_destroy();
			unset($_SESSION);
			return !$this->state;
		}
		return false;
	}
}