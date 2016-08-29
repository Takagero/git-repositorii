<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL);

//Запускаем сессии
//session_start();

// Константа:
define ('DIRSEP', DIRECTORY_SEPARATOR);


// Узнаём путь до файлов проекта
$site_path = realpath(dirname(__FILE__) . DIRSEP . '.' . DIRSEP) . DIRSEP ;
define ('site_path', $site_path);

// Автозагрузка классов на лету (стэк)
include_once($site_path . "servises" . DIRSEP . "Autoloader.php");
spl_autoload_register(array(new Autoloader(), 'getController'));

$requestM = new RequestManager();
$getNameController = $requestM->getController();

$controllerName = ucfirst($getNameController) . "Controller";

$controller = new $controllerName();

$controller->setParams($requestM->getParams());
$controller->setAction($requestM->getActoin());
$controller->run();

?>