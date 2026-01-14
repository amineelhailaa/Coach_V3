<?php
class Pages extends Controller
{
    public function __construct(){
        $this->postModel= $this->model('Post');
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