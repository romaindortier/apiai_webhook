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
$log->error(serialize($_GET));
$log->info('POST');
$log->error(serialize($_POST));


header('Content-type:application/json;charset=utf-8');

$data = 
	[
	'speech'=> 'Today '.$_GET['getparam'],
	'source'=> 'apiai_webhook',
	'displayText'=> 'Today '.$_GET['getparam']
	'data'=> 'Today '.$_GET['getparam'],
	'contextOut'=> 'Today '.$_GET['getparam'],
	'source'=> 'DuckDuckGo',
	];
print  json_encode($data);