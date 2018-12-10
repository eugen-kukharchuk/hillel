<?php
class Country
{
    private $id;
    private $name;
    private $code;
    private $status;

//    public function __construct($login, $status = 'new')
//    {
//        $this->login = $login;
//        $this->status = $status;
//    }


    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getCode(){
        return $this->code;
    }

    public function getStatus(){
        return $this->status;
    }
}