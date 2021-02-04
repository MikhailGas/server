<?php
require_once('vendor/autoload.php');
define('DEBUG', true);

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
$start_time = microtime(true);
// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('log/my.log', Logger::DEBUG));
if (DEBUG){
    $log->info('До выполнения цикла ' . memory_get_usage());
}


for($i = 0; $i < 100000; $i++){
    $arr[0][] = $i;
}
if (DEBUG){ 
    $log->info('После выполнения цикла ' . memory_get_usage());
}

unset($arr);

if (DEBUG){
   $log->info('После удаления массива ' . memory_get_usage());
}
echo 'End';
$end_time = microtime(true);

// add records to the log
if (DEBUG){
    $log->info($end_time - $start_time);
    $log->info(memory_get_usage());
}


function deep_end( $count ) {
    // добавляем 1 к параметру count
    $count += 1;
    if ( $count < 48 ) {
            deep_end( $count );
    }
    else {
            trigger_error( "going off the deep end!" );
    }
}
deep_end( 1 );
