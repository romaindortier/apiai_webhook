<?php

require '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('log.log', Logger::WARNING));

// add records to the log
// $log->info(var_export('index', true));
// $log->info(var_export($_POST, true));
$log->warning('SnneFoo');
$log->error('Bar');
$log->info(serialize($_GET));
$log->info(serialize($_POST));


header('Content-type:application/json;charset=utf-8');
print '"fulfillment": {
  "speech": "Today in Boston: Fair, the temperature is 37 F",
  "source": "apiai_webhook",
  "displayText": "Today in Boston: Fair, the temperatuuuure is 37 F"
}';