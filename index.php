<?php


// КОнстанта разделения
define('SEP', DIRECTORY_SEPARATOR);

// Нужно узнать путь до файла
$site_path = realpath(dirname(__FILE__) . SEP) .  '/' . SEP;
var_dump($site_path);
//Константа пути
define ('site_path', $site_path);

//Подключаем startup (загрузка классов на лету)
require_once($site_path . 'startup.php');

# Соединяемся с БД


# Загружаем объект Template


# Загружаем router;
# Загружаем router;
# Загружаем router;
# Загружаем router;
# Загружаем router;
# Загружаем router;

?>