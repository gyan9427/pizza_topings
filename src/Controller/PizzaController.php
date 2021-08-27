<?php
namespace Src\Controller;

use Src\TableGateways\TopingsGateway;

class PizzaController{
    private $db;
    private $requestMethod;
    private $userId;

    private $topingsGateway;

    public function __construct($db,$requestMethod, $id){
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->id = $id;

        $this->topingsGateway= new TopingsGateway($this->db);
    }

    public function processRequest(){
       
        switch ($this->requestMethod) {
            case 'GET':
                if(!$this->id){
                    $response = $this->getAllTopings();
                }
                else{
                    $response = $this->getToping($this->id);
                }
                
                break;
            
            default:
                # code...
                break;
        }
        
        header($response['status_code_header']);
        if($response['body']){
            echo $response['body'];
        }
    }

    public function getAllTopings(){
        $result = $this->topingsGateway->findAll();
        $response['status_code_header']= 'http:/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    public function getToping($id){
        $result = $this->topingsGateway->findToping($id);
        $response['status_code_header']= 'http:/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }
}