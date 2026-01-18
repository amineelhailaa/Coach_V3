<?php
namespace services;
use \repositories\{sportifRepository,coachRepository,UserRepository};
use \services\{UploadPic,RoleLogic};


class Authentication
{
    private $userRepo;
    private $coachRepo;
    private $sportifRepo;
    private $factory;
    private $data;
    private $db;


    public function __construct($db)
    {
        $this->db = $db;
        $this->userRepo = new UserRepository($db);
    }


    public function registerService($data)
    {

        //validation Email
        if (empty($data['email'])) {
            $data['email_err'] = 'please enter the email';
        }elseif($this->userRepo->findUserByEmail($data['email'])) {
            $data['email_err'] = 'email already linked with an account';
        }

        //validate passowrd
        if (empty($data['password'])) {
            $data['password_err'] = 'please enter the password';
        }
        //validation nom
        if (empty($data['nom'])) {
            $data['nom_err'] = 'please enter the email';
        }

        if(empty($data['pic'])){
            $data['pic_err'] = 'please upload your image';
        }
        if(empty($data['phone'])){
            $data['phone_err'] = 'please type your phone';
        }



        //make sure errors are empty
        if (empty($data['email_err']) && empty($data['password_err']) && empty($data['nom_err'])) {
            $this->factory = new RoleLogic($data);
            $user = $this->factory->Decide(); //return the right class ( coach or sportif )
            //now i need to pass the user to sign up function
            //i have two options the first one is making a function that sign in in user class anyway then make another one
            //for each class , and inherit from user repository but its kinda messy cuz i need to load those repositories here 3 repos meh
            //ill
            $user = $this->factory->Decide();
            $this->userRepo = new UserRepository($this->db);
            $id = $this->userRepo->register($user); //register the user and get id
            $user->setId($id);
            if($user->getRole()==='coach'){
                $this->coachRepo = new coachRepository($this->db);
                $this->coachRepo->registerCoach($user);
            }
            elseif ($user->getRole()==='sportif'){
                $this->sportifRepo = new sportifRepository($this->db);
                $this->sportifRepo->registerSportif($user);
            }
            return 1;
        } else {
            //load view with errors
            return $data;
        }

    }


    public function loginService($data)
    {
       $user = $this->userRepo->findUserByEmail($data['email']);
       $user = (new \factories\UserFactory)->create($data);
       if (password_hash($data['password'],$user->getPassword())){
           $_SESSION['id'] = $user['id'];
           $_SESSION['role']= $user['role'];
           return true;
       }

    }

}