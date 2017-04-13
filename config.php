<?php

require_once 'vendor/autoload.php';

//Quase um jQuery haha
spl_autoload_register(function ($className) {
    $file = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, 'class\\' . $className) . ".php";
    if (file_exists($file)) {
         require_once($file);
    }
});
