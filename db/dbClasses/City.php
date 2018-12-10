<?php
class City
{
    private $id;
    private $name;
    private $country_id;
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

    public function getCountryId(){
        return $this->country_id;
    }

}