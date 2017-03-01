<?php

require '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('log.log', Logger::INFO));

header('Content-type:application/json;charset=utf-8');


$json = file_get_contents('php://input'); 
$request = json_decode($json, true);
// add records to the log
// $log->info(var_export('index', true));
// $log->info(var_export($_POST, true));
// $log->warning($_GET['getparam']);


$params['query'] = $request["result"]["resolvedQuery"];
$params['intent'] = $request["intentName"];
$params['action'] = $request["result"]["action"];
$params['contexts'] = $request["result"]["contexts"];
$params['parameters'] = $request["result"]["parameters"];

/*
$log->info('SERVER');
$log->info(serialize($_SERVER));
*/
$log->info('GETPOSTJSON');
// print_r('uu');
$data = file_get_contents('php://input');
// print_r($data);
$log->info(serialize($params));
$parsed_data = json_decode($data, true);



$data = 
	[
	'speech'=> 'Test BUM '.$_GET['getparam'].' '.$params['query'].' '.$params['intent'].' '.$params['action'].' '.$params['contexts'].' '.serialize($params['parameters']),
	'source'=> 'apiai_webhook',
	'displayText'=> 'Todayo '.$_GET['getparam'].' '.$parsed_data['id']
	];
print  json_encode($data);