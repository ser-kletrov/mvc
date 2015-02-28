<?php
error_reporting(E_ALL);

// init globals
define('ROOT_PATH', __DIR__.'/');
include_once(ROOT_PATH.'classes/system/mymvc.php');

// create application object
$app = new App\Mymvc();

$test = new \Debug\Test();
?>