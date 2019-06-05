<?php


// Default Vendor autoload
require_once "../vendor/autoload.php";



// ------------------------------------
// We need to talk about this code below:

//$rootPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
//
//// Set Logger with default StreamHandler
//$logPath = $rootPath . 'logs' . DIRECTORY_SEPARATOR . 'application.log';
//$log = new Logger('main-application');
//$streamHandler = new StreamHandler($logPath);
//$log->pushHandler($streamHandler);
//
//
//// Load Config
//try {
//    $configPath = $rootPath . 'config' . DIRECTORY_SEPARATOR . 'global.php';
//    Config::loadConfig($configPath, "main-application");
//} catch (MissingFileException $e) {
//    $log->critical('Main Application Configuration failed! Message: ' . $e->getMessage());
//}
//
//// Set Environment variables
//$envPath = Config::get('paths');
//$dotenv = Dotenv\Dotenv::create($envPath['root']);
//$dotenv->load();
//
//$dotenv->required('environment')->allowedValues(['production', 'development']);
//
//$environment = getenv('environment');
//---------------------------------------


require '../src/controllers/Controller.php';


