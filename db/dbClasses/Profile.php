<?php
class Profile
{
    private $id;
    private $first_name;
    private $last_name;
    private $address;

    public function getId(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function getAddress(){
        return $this->address;
    }
}