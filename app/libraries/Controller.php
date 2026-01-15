<?php

class Controller
{

    public function model($model)
    {
        //require model file
        require_once "../app/models/" . $model . ".php";
        return new $model();
    }


    public function service($service){
      require_once "../app/service/" . $service . ".php";
      return new $service;
    }


    public  function repository($repository)
    {
        require_once "../app/repository" . $repository . ".php";
        return new $repository;
    }



    public function view($view,$data=[]){
        if(file_exists('../app/views/'.$view . '.php')){
            require_once '../app/views/'.$view . '.php';
        } else {
            die("view or page doesnt exist");
        }
    }

}