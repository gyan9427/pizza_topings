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
            $result  = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch(\PDOException $e){
            exit($e->getMessage());
        }
    }

    public function findToping($id){
        $statement = "
        SELECT title FROM topings WHERE id = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }catch(\PDOException $e){
            exit($e->getMessage());
        }
    }
}