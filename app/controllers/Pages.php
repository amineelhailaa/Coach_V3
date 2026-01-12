<?php
class Pages extends Controller
{
    public function __construct(){
    }



    public function index()
    {
        $this->view('pages/home');
    }
    public function about($id){
        echo $id;
    }
}