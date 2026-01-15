<?php

namespace services;
use Coach;
use Sportif;

class RoleLogic
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function Decide()
    {
        if ($this->data['role'] === 'coach') {
            return new Coach($this->data['nom'], $this->data['phone'], $this->data['role'], $this->data['email'], $this->data['password'], $this->data['sport'], $this->data['exp'], $this->data['bio']);
        } else {
            return new Sportif($this->data['nom'], $this->data['phone'], $this->data['email'], password_hash($this->data['password'], PASSWORD_DEFAULT));
        }
    }
}