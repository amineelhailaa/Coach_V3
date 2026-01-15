<?php


abstract class User
{
    protected $id;
    protected $nom;
    protected $phone;
    protected $email;
    protected $password;
    protected $pic;

    public function __construct($nom, $phone, $email, $password, $pic, $id = null)
    {
        $this->nom = $nom;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->pic = $pic;
        $this->id = $id;
    }


    public function setName($n)
    {
        $this->nom = $n;
    }

    public function setPhone($p)
    {
        $this->phone = $p;
    }

    public function setEmail($mail)
    {
        $this->email = $mail;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPic($path){ $this->pic = $path;}
    public function getPic(){ return $this->pic; }


    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->nom;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getPassword()
    {
        return $this->password;
    }


    abstract public function getRole();

}