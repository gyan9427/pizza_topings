<?php

namespace Src\StatusMessage;

class Status{
    private $code;

    public function __construct($code){
        $this->code = $code;
    }

    public function statusMessageReturn(){
    switch ($this->code) {
        case 404:
            return "404 Source Not Found";
            break;
        
        case 200:
            return "200 Everything worked correctly";
            break;
        
        default:
            exit;
            break;
        }

    }

}
