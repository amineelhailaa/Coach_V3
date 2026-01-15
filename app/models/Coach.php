<?php


class Coach extends User
{
    private $sport;
    private $exp;
    private $bio;

    public function __construct($nom, $phone, $email,$password,$pic, $sport, $exp, $bio, $id=null)
    {
        parent::__construct($nom, $phone, $email,$password,$pic, $id);
        $this->sport = $sport;
        $this->exp = $exp;
        $this->bio = $bio;
    }


    public function getSport() {return $this->sport;}
    public function getExp() {return $this->exp;}
    public function getDescription() {return $this->bio;}
    public function getRole() { return "coach"; }




    public function setSport($sport) {$this->sport = $sport;}
    public function setExp($experience) {$this->exp = $experience;}
    public function setBio($bio) {$this->bio = $bio;}



}