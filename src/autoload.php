<?php

function __autoload($class_name) {
    $folders = ['/model/', '/controller/', '/../vendor/verot/class.upload.php/src/'];

    foreach($folders as $folder) {
        $name = __DIR__.$folder.$class_name . '.php';
        if (file_exists($name)) {
            include($name);
        }

        $name = __DIR__.$folder.'class.'.$class_name.'.php';
        if (file_exists($name)) {
            include($name);
        }
    }
}
