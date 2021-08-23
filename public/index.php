<?php
ini_set("display_errors",1);
include "../bootstrap.php";


use Src\StatusMessage\Status;
use Src\System\DatabaseConnector;

header("Access-Control-Allow-Origin:*");
header("Content-type:text/html,utf8");
header("Access-Control-Allow-Methods:OPTION,PUT,DELETE,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

// $dbname = getenv('DB_NAME');

// var_dump($_ENV['DB_NAME']);

if(!strpos($uri,"v1/")){
    $message = new Status(404);
    $status = $message->statusMessageReturn();
    var_dump($status);    
}

// var_dump($uri);

$dbConnection = new DatabaseConnector();
