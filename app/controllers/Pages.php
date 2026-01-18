<?php


class Pages extends \libraries\Controller
{
    public function __construct(){
    }



    public function index()
    {
        $data = [
            'title'=>'Welcome'
        ];
        $this->view('pages/home',$data);
    }
    public function about($id){
        echo $id;
    }
}