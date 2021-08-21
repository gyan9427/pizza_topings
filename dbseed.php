<?php
require 'bootstrap.php';

use Src\System\DatabaseConnector; 

$statement = <<<EOS
    CREATE TABLE IF NOT EXISTS topings(
    id INT NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)) ENGINE=INNODB;
    EOS;

$dbConnection = (new DatabaseConnector())->getConnection();

try {
    $createTable = $dbConnection->exec($statement);
}catch(\PDOException $e){
    exit($e->getMessage());
}