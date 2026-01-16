<?php
    namespace repositories;
    use models\Coach;
    class coachRepository
    {

        private $con;
        public function __construct($db)
        {
            $this->con = $db;
        }
        public function registerCoach(Coach $user)
        {
            $this->con->query("insert into coaches (coach_id,exp_years,bio,discipline) values (:id,:exp, :bio, :sport)");
            $this->con->bind(':id',$user->getId());
            $this->con->bind(':exp',$user->getExp());
            $this->con->bind(':bio',$user->getBio());
            $this->con->bind(':sport',$user->getSport());

            if($this->con->execute()) return true;
            else return false;
        }


    }