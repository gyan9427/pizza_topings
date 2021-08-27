<?php
ini_set("display_errors",1);
include "../bootstrap.php";


use Src\StatusMessage\Status;
use Src\System\DatabaseConnector;
use Src\Controller\PizzaController;

header("Access-Control-Allow-Origin:*");
header("Content-type:json/application,utf8");
header("Access-Control-Allow-Methods:OPTION,PUT,DELETE,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



$uri = parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$id= 0;
$uri_element = explode('/',$uri);
// $dbname = getenv('DB_NAME');

// var_dump($uri);
$status = "OK";

if(!strpos($uri,"topings/v1/")){
    $message = new Status(404);
    $status = $message->statusMessageReturn();
    header('HTTP/1.1 404 Not Found'); 
    echo "Resource not found";
    exit();  
}
if($uri_element[3]){
    if(is_numeric($uri_element[3])){
        $id = $uri_element[3];
    }
    else{
        header('HTTP/1.1 404 Not Found'); 
        echo "Resource not found";
        exit();
    }
    
}
// var_dump($uri);
if ($status === "OK"){
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    $dbConnection = (new DatabaseConnector())->getConnection();

    $controller = new PizzaController($dbConnection,$requestMethod,$id);
    $controller->processRequest();

}

