<?php

    function my_autoloader($class_name) {
        $array_paths = array(
            '/php/views/',
            '/php/components/'
        );
    
        foreach ($array_paths as $path) {
            $path = ROOT . $path . $class_name . '.php';
            //print_r($path);
            if (is_file($path)) {
                include_once $path;
            }
        }
    }

    spl_autoload_register('my_autoloader');
    
?>