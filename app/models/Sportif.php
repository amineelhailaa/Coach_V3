<?php

namespace models;
use models\User;

class Sportif extends User
{
    public function getRole()
    {
        return 'sportif';
    }
}