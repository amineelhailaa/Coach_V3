<?php
namespace repositories;
use models\User;
class UserRepository
{
    protected $con;

    public function __construct($db)
    {
        $this->con = $db;
    }

    public function findUserByEmail($email)
    {
        $this->con->query("select * from users where email=:email");
        $this->con->bind(':email', $email);
        $this->con->single();
        if($this->con->rowCount()>0) return true;
        else return false;
    }


    public function register(User $user)
    {
        $this->con->query("insert into users  (nom,email,password,phone,pic) values(:nom,:email, :password,:phone, :pic )");
        $this->con->bind(':nom',$user->getNom());
        $this->con->bind(':email',$user->getEmail());
        $this->con->bind(':password',$user->getPassword());
        $this->con->bind(':phone',$user->getPhone());
        $this->con->bind(':pic',$user->getPic());

        if($this->con->execute()) return $this->con->insertId(); //to insert into coaches or sportifs
        else return false;
    }


}