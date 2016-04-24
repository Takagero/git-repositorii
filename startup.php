<?php

    // Загрузка классов «на лету»
function __autoload($class_name) {

            $filename = strtolower($class_name) . '.php';

            $file = site_path . 'classes' . SEP . $filename;

            if (file_exists($file) == false) {

                    return false;

            }


            include ($file);

    }

$registry = new Registry;

?>