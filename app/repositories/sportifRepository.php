<?php

namespace repositories;
use models\Sportif;
class sportifRepository
{

    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function registerSportif(Sportif $user)
    {
        $this->con->query("insert into sportifs(sportif_id, status) values (:id, 'active') ");
        $this->con->bind(':id',$user->getId());
        if($this->con->execute()) return true;
        else return false;
    }
}