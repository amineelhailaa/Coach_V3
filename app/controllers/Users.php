<?php


class Users extends Controller
{

    public function __construct()
    {

    }

    public function register()
    {
        try {


            if ($_SERVER['REQUEST_METHOD'] === "POST") {

                //process the form


                //sanitize post in one line

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


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
                    'passowrd_err' => '',
                ];


                //validation Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'please enter the email';
                }
                //validate passowrd
                if (empty($data['password'])) {
                    $data['passowrd_err'] = 'please enter the email';
                }
                //validation nom
                if (empty($data['nom'])) {
                    $data['nom_err'] = 'please enter the email';
                }


                if (empty($data['email_err']) && empty($data['passowrd_err']) && empty($data['nom_err'])) {
                    die('SUCCESS');
                } else {
                    //load view with errors
                    $this->view('users/register', $data);
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
            $this->view('users/register');

        }catch (Throwable $e){
            echo  $e->getMessage();
        }
    }


    public function login(){
        {
            if ($_SERVER['REQUEST_METHOD'] === "POST") {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);



                //init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'passowrd_err' => ''
                ];


                //validation Email
                if(empty($data['email'])){
                    $data['email_err'] ='please enter the email';
                }
                //validate passowrd
                if(empty($data['password'])){
                    $data['passowrd_err'] ='please enter the email';
                }



                if(empty($data['email_err']) && empty($data['passowrd_err']) ){
                    die('SUCCESS');
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