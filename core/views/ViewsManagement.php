<?php
/**
 * Created by PhpStorm.
 * User: rios0rios0
 * Date: 20/03/19
 * Time: 19:29
 */

class ViewsManagement
{
	protected $vars = array();
	protected $layout_default = "layouts/default.php";

	public function __construct()
	{
	}

	public function setLayout($path)
	{
		if (file_exists($path)) {
			$this->layout_default = $path;
		} else {
			throw new Exception("No layout file present in path " . $path);
		}
	}

	public function render()
	{
		include $this->layout_default;
	}

	public function __get($name)
	{
		return $this->vars[$name];
	}

	public function __set($name, $value)
	{
		$this->vars[$name] = $value;
	}
}