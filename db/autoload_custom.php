<?php

spl_autoload_register('autoloadDbClasses');

function autoloadDbClasses($className) {
    $dirClass = str_replace('\\', '/', $className);
    $pathClass = "dbClasses/{$dirClass}.php";
  //  var_dump($pathClass);
    if (file_exists($pathClass)) {
        require_once $pathClass;
    }
}

