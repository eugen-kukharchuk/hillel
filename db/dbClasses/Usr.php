<?php
/**
 * Created by PhpStorm.
 * User: р
 * Date: 08.12.2018
 * Time: 21:34
 */

class Usr
{
    private $id;
    private $login;
    private $last_login;
    private $status;

//    public function __construct($login, $status = 'new')
//    {
//        $this->login = $login;
//        $this->status = $status;
//    }

    public function getLogin(){
        return $this->login;
    }

    public function getId(){
        return $this->id;
    }

    public function getLastLogin(){
        return $this->last_login;
    }

    public function getStatus(){
        return $this->status;
    }
}