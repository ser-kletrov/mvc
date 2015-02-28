<?php
namespace App;

class Mymvc {
	// default configuration values
	private $config = [
		'classesPath' => 'classes/',
	];

	public function __construct() {
		### Init ###
		// config
		$this->loadConfig();

		// autoloader
		include_once(ROOT_PATH . $this->config['classesPath'] . 'system/autoloader.php');
		$loader = new Autoloader($this->config);

	}

	private function loadConfig() {
		$file = ROOT_PATH . 'config.php';
		if (file_exists($file)) {
			include_once($file);
			$this->config = array_merge($this->config, $config);
		} else {
			echo "ERROR - конфиг не загружен\n<br>";
		}
	}
}
?>