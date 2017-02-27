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
$log->info('REQUEST');
$log->error(serialize($_REQUEST));

header('Content-type:application/json;charset=utf-8');

$data = 
	[
	'speech'=> 'Today '.$_GET['getparam'].' '.$_GET['id'],
	'source'=> 'apiai_webhook',
	'displayText'=> 'Todayo '.$_GET['getparam'].' '.$_GET['id']
	];
print  json_encode($data);