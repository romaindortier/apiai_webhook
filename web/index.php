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

$data['fulfillment'] = 
	['speech'=> 'Today in Boston: Fair, the temperature is 37 F',
	'source'=> 'apiai_webhook',
	'displayText'=> 'Today in Boston: Fair, the temperature is 37 F'
	];
print  json_encode($data);