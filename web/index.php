<?php

require '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('log.log', Logger::WARNING));

// add records to the log
$log->info(var_export('index', true));
$log->info(var_export($_POST, true));
// $log->warning('Foo');
// $log->error('Bar');

header('Content-type:application/json;charset=utf-8');
print '{
"speech": "Barack Hussein Obama II is the 44th and current President of the United States."
}';