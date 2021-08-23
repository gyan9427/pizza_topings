<?php

namespace Src\TableGateways;

class TopingsGateway{
    private $db = null;

    public function __construct($db){
        $this->db = $db;
    }

    public function findAll(){
        $statement = "
        SELECT * FROM topings;";

        try {
            $statement = $this->db->query($statement);
            $result  = $statement->fetchAll(\PDO::FETCH_ASSPC);
            return $result;
        }catch(\PDOException $e){
            exit($e->getMessage());
        }
    }
}