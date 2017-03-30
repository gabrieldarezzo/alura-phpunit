<?php

require_once 'vendor/autoload.php';

function my_autoload ($className) {
	
	$file = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\',DIRECTORY_SEPARATOR, 'class\\' . $className) . ".php";
	if(file_exists($file)){
		 require_once($file);
	}

}





spl_autoload_register("my_autoload");