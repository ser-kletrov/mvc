<?php
namespace App;
/*
*	Autoloader class
*/
class Autoloader {
	// path to classes directory
	private $path = '';

	// associate namespaces with category names (default)
	private $associate = [
		'App' => 'system/',
		'Debug' => 'debug/',
	];

	public function __construct($config) {
		// load base path
		$this->path = $config['classesPath']; // 'classesPath' is always set in app. config
		
		// load associations
		if ( isset($config['loaderAssociates']) ) {
			$this->associate = array_merge($this->associate, $config['loaderAssociates']);
		}

		spl_autoload_register([$this, 'autoload']);
	}

	// autoloader function
	private function autoload($className) {
		$path = ROOT_PATH . $this->path; // full path to classes file
		$classNames = explode("\\", $className);
		$file = array_pop($classNames); // class file name

		foreach ($classNames as $name) {
			if (array_key_exists($name, $this->associate)) {
				$path .= $this->associate[$name];
			} else {
				echo "ERROR - неверно указан Namespace\n<br>";
				return false;
			}
		}

		$path .= $file;
		$this->includeFile($path);
	}

	// search and include file if exists
	private function includeFile($file) {
		$file .= '.php';
		if (is_file($file)) {
			require_once($file);
			return;
		}

		echo "ERROR - файл не подключен\n<br>";
	}
}
?>