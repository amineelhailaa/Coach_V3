<?php

namespace services;
use \models\{Coach,Sportif};

class RoleLogic
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function Decide()
    {
        $this->data['password']=password_hash($this->data['password'],PASSWORD_DEFAULT);
        if ($this->data['role'] === 'coach') {
            return new Coach($this->data['nom'], $this->data['phone'], $this->data['email'], $this->data['password'],$this->data['pic'], $this->data['sport'], $this->data['exp'], $this->data['bio']);
        } else {
            return new Sportif($this->data['nom'], $this->data['phone'], $this->data['email'], $this->data['password'],$this->data['pic']);
        }
    }
}