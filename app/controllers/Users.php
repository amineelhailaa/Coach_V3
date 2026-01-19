<?php
use \libraries\Database;
use \repositories\{UserRepository,coachRepository,sportifRepository};
use models\{Coach,Sportif,User};
use services\{Authentication,RoleLogic,UploadPic};


class Users extends \libraries\Controller
{

    private $repo;
    private $db;
    private $auth;
    public function __construct()
    {
        $this->db = new Database();
        $this->repo = new UserRepository($this->db);
        $this->auth = new Authentication($this->db);
    }

    public function register()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === "POST") {
                //filling role factory
                //process the form
                //sanitize post in one line
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? [];
                //init data
                $data = [
                    'nom' => trim($_POST['nom']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'phone' => trim($_POST['phone']),
                    'role' => trim($_POST['role']),
                    'exp' => trim($_POST['exp']),
                    'bio' => trim($_POST['bio']),
                    'sport' => trim($_POST['sport']),
                    'pic' => UploadPic::uploadPicture($_FILES['avatar']),
                    'nom_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'phone_err' =>''
                ];

                $data = $this->auth->registerService($data);
                if($data===1) {
                    die("succssess");
                    //redirect , register done
                } else {
                    $this->view('users/register',$data);
                }
            } else {
                $data = [
                    'nom' => '',
                    'email' => '',
                    'password' => '',
                    'phone' => '',
                    'role' => '',
                    'exp' => '',
                    'bio' => '',
                    'sport' => '',
                    'nom_err' => '',
                    'phone_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];
            }


            //load the view
            $this->view('users/register',$data);

        }catch (\Throwable $e){
            echo  $e->getMessage();
        }
    }


    public function login(): void
    {
        {
            if ($_SERVER['REQUEST_METHOD'] === "POST") {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? [];



                //init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                //validation Email
                if(empty($data['email'])){
                    $data['email_err'] ='please enter the email';
                }
                if( !$this->repo->findUserByEmail($data['email'])){
                    $data['email_err'] ='email doesnt exist!';
                }
                //validate passowrd
                if(empty($data['password'])){
                    $data['passowrd_err'] ='please enter the email';
                }



                if(empty($data['email_err']) && empty($data['passowrd_err']) ){
                    $this->auth->loginService($data);
                    die("success");
                } else {
                    //load view with errors
                    $this->view('users/login',$data);
                }
                //process the form


            } else {
                //init data
                $data = [
                    'nom' => '',
                    'email' => '',
                    'password' => '',
                    'phone' => '',
                    'role' => '',
                    'exp' => '',
                    'bio' => '',
                    'sport' => '',
                    'nom_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];
            }


            //load the view
            $this->view('users/login',$data);

        }

    }

}