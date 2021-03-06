<?php
class Autoloader {
	
	protected $paths = array(
	'controllers',
	'model',
	'servises',
	);
	
	public function getController($className){
		foreach ($this->paths as $path) {
			$filename = site_path . $path . DIRSEP . $className . ".php";
			if (file_exists($filename)) {
				include($filename);
				break;
			}
		}
	}
}
?>