<?php

require '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('log.log', Logger::INFO));

// add records to the log
// $log->info(var_export('index', true));
// $log->info(var_export($_POST, true));
// $log->warning($_GET['getparam']);
$log->info('GET');
$log->info(serialize($_GET));
$log->info('POST');
$log->info(serialize($_POST));
$log->info('REQUEST');
$log->info(serialize($_REQUEST));
$log->info('SERVER');
$log->info(serialize($_SERVER));
$log->info('GETPOSTJSON');
$data = file_get_contents('php://input');
$log->info($data);
$parsed_data = json_decode($data, true);

header('Content-type:application/json;charset=utf-8');

$data = 
	[
	'speech'=> 'Test zzzz '.$_GET['getparam'].' '.$parsed_data['id'],
	'source'=> 'apiai_webhook',
	'displayText'=> 'Todayo '.$_GET['getparam'].' '.$parsed_data['id']
	];
print  json_encode($data);